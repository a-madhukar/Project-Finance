<?php

namespace App\Http\Controllers;

use Response; 
use App\Budget; 
use App\DailyExpense;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TrackExpensesController extends Controller
{
    //
    public function display()
    {
    	return view('trackExpenses.display'); 
    }

    public function getMonthlyData($id)
    {
    	$totalExpenses = DailyExpense::addAndGroup($id); 

    	return Response::json($totalExpenses,200); 
    }
}
