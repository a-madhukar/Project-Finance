<?php

namespace App;

use DB; 
use App\DailyExpense;
use Illuminate\Database\Eloquent\Model;

class DailyExpense extends Model
{
    //
    //
    protected $fillable = [
    	'budget_id',
    	'category',
        'name',
    	'amount',
    	'date'
    ]; 

    //accessors && mutators

    public function setAmount($amount)
    {
    	$this->attributes['amount']= $amount*100; 
    }

    public function getAmount($amount)
    {
    	return $amount/100; 
    }

    //one to many relationship with Budget
    public function budget()
    {
    	return $this->belongsTo(DailyExpense::class,'budget_id'); 
    }

    //local scopes
    public static function scopeCategory($query,$id,$category)
    { 
        return $query->where('category',$category)->where('budget_id',$id)->get(); 
    }

    //methods

    public static function addAndGroup($budgetId)
    {
        $dailyExpenses = DB::table('daily_expenses')
                            ->select(DB::raw(' daily_expenses.budget_id, daily_expenses.category, daily_expenses.date, sum(daily_expenses.amount) as total_spent'))
                            ->where('daily_expenses.budget_id','=',$budgetId)
                            ->groupBy('category')
                            ->get(); 

        return $dailyExpenses; 
    }
}
