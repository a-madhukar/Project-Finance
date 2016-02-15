<?php

namespace App\Http\Controllers;

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
}
