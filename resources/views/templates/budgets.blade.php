<template id="budgets_table">
	<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Start Date</th>
						<th>End Date</th>
						<th>Total Amount</th>
						<th>Amount Spent</th>
					</tr>
				</thead>
		
				<tbody>
					<tr v-for="budget in budgets" track-by="$index">
						<td>@{{$index+1}}</td>
						<td><a href="budgets/@{{budget.id}}">@{{budget.name}}</a></td>
						<td>@{{budget.start_date}}</td>
						<td>@{{budget.end_date}}</td>
						<td>@{{budget.amount}}</td>
						<td>@{{budget.total_expenses==null ? "0.00": budget.total_expenses}}</td>
					</tr>
				</tbody>
				
			</table>
		</div>
</template>