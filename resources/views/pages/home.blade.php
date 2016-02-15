@extends('layout')

@section('content')

<div class="col-md-8 col-md-offset-2">
	@include('partials._errors')

	<h2>Your Budgets...</h2>
	<hr>
	
	@if(count($budgets))
	<display-budgets :budgets="{{$budgets}}"></display-budgets>
	@else
	<p>You haven't created any budgets yet...</p>
	@endif
</div>

@stop