<template id="trackExpenses">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<h3>Expenses This Month</h3>
			<hr>
			<select name="budgets" id="budgets" class="form-control col-md-4 center-block">		
				<option v-for="budget in budgets_list" value="@{{budget.id}}">@{{budget.name}}</option>
			</select>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<hr>
			<canvas id="myChart" class="center-block" width="400" height="400" ></canvas>
		</div>
	</div>
	

</template>