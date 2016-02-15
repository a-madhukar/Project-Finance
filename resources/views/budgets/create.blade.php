@extends('layout')

@section('content')
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<h2>Create Budget</h2>
		<hr>
	</div>
</div>
<form action="{{url('budgets')}}" method="POST">
@include('partials._budget')

<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<h3>Plan Your Expenditure</h3>
		<hr>
	</div>
</div>

<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<plan-expenditure></plan-expenditure>
		<hr>
	</div>
</div>


<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<button type="submit" class="btn btn-primary center-block">Create Budget</button>
	</div>
</div>

</form>
@stop