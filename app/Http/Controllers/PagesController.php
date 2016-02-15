<?php

namespace App\Http\Controllers;

use App\Budget;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    //

    public function index()
    {
    	return view('pages.index'); 
    }

    public function home(Budget $budget)
    {
    	// $budgets=Budget::orderBy('start_date','desc')
    	// 				->get();

    	//dd($budget->displayBudgetData()); 

    	$budgets= json_encode($budget->displayBudgetData()); 

    	return view('pages.home',compact('budgets')); 
    }
}
