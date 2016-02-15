@extends('layout')

@section('content')

@include('partials._displayBudget',['budget'=>$budget])

<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<ul class="nav nav-tabs" role="tablist">	
			<li class="active">
				<a href="#planned" aria-controls="planned" role="tab" data-toggle="tab">
					What You Planned 
				</a>
			</li>

			<li>
				<a href="#actual" aria-controls="actual" role="tab" data-toggle="tab">
					What You Actually Spent
				</a>
			</li>	
		</ul>

		<div class="tab-content">
			<div class="tab-pane active" role="tabpanel" id="planned">
				<plan-expenditure :planned_expenditures="{{$budget->plannedExpenditure}}" :budget="{{$budget}}"></plan-expenditure>		
			</div>

			<div class="tab-pane" role="tabpanel" id="actual">
				<display-daily-expenses :daily_expenses="{{$dailyExpenses}}"></display-daily-expenses>
			</div>
		</div>

	</div>
</div>
@stop