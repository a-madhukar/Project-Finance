<?php

namespace App;

use DB;
use App\Expenditure; 
use App\DailyExpense;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    //
    protected $fillable = [
    'name',
    'amount',
    'start_date',
    'end_date'
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

    //relationships
    public function plannedExpenditure()
    {
        return $this->hasMany(Expenditure::class,'budget_id'); 
    }

    public function allDailyExpenses()
    {
        return $this->hasMany(DailyExpense::class,'budget_id'); 
    }

    //methods

    //create with all the related expenditures
    public function createExpenditure($expenditures)
    {
        foreach ($expenditures as $expenditure) {
            # code...
            $this->plannedExpenditure()
            ->saveMany([
                new Expenditure([
                    'category'=>$expenditure->category, 
                    'amount'=>$expenditure->amount,
                    'deadline'=>$expenditure->deadline
                    ])
                ]); 
        }

        return $this->plannedExpenditure; 
    }

    //gets the data to display all the data
    public function displayBudgetData()
    {
        $budgets = DB::table('budgets')
                    ->leftJoin('daily_expenses','daily_expenses.budget_id','=','budgets.id')
                    ->select(DB::raw('budgets.id,budgets.name, budgets.amount, budgets.start_date, budgets.end_date, sum(daily_expenses.amount) as total_expenses'))
                    ->groupBy('budgets.id')
                    ->orderBy('budgets.start_date','desc')
                    ->get();

        return $budgets;
    }
}

