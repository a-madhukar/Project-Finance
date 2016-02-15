<?php

Route::get('/','PagesController@index'); 

Route::group(['middleware' => ['web']], function () {
    //

    Route::get('home','PagesController@home'); 
    Route::resource('budgets','BudgetsController'); 
    Route::resource('dailyexpense','DailyExpenseController'); 
    Route::get('budgets/{budgetId}/{category}','DailyExpenseController@listRelatedExpenses');

    Route::get('track','TrackExpensesController@display'); 

});
 
 Route::resource('expenditure','PlannedExpenditureController'); 
