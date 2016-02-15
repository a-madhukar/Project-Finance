@inject('budgets','App\Budget') 

@extends('layout')

@section('content')
	<track-expenses :budgets_list="{{$budgets::all()}}"></track-expenses>
@stop