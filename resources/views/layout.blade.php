<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">.
	<title>Project Finance</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

	<!--Custom theme-->
	<link rel="stylesheet" href="{{asset('css/app.css')}}"> 
</head>
<body>

	<!-- Fixed navbar -->
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Project Finance</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><a href="#" data-toggle="modal" data-target=".createDailyExpenseModal">Record Expense</a></li>
					<li><a href="{{url('budgets/create')}}">New Budget</a></li>
					<li><a href="{{url('track')}}">Track Yearly Expenses</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>
	
	<!--Content Goes here-->
	<div class="container app-content">
		@yield('content')
	</div>

	@include('template')

	@include('modal')

	<!--Jquery-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.0/jquery.js"></script> 

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

	<!--VUE JS-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.16/vue.js"></script> 

	<!--Vue resource-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/0.6.1/vue-resource.js"></script>

	<!--Charts JS-->
	<script src="{{asset('js/charts.js')}}"></script>

	<!--Custom JS-->
	<script src="{{asset('js/all.js')}}"></script>
</body>
</html>