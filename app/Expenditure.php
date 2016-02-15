<?php

namespace App;

use App\Budget;
use Illuminate\Database\Eloquent\Model;

class Expenditure extends Model
{
    //
    protected $fillable = [
    	'budget_id',
    	'category',
    	'amount',
    	'deadline'
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
    	return $this->belongsTo(Budget::class,'budget_id'); 
    }
}
