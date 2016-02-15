@extends('layout')

@section('content')
@include('partials._displayBudget',['budget'=>$budget])

<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<h4>This Is What You Spent On {{$category}}...</h4>
		<expenses-list :expenses="{{$expenses}}"></expenses-list> 	
	</div>
</div>
@stop