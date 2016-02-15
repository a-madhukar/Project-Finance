<template id="displayDailyExpenses">
	<div class="table-responsive" v-if="daily_expenses.length!=0">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>#</th>
					<th>Category</th>
					<th>Amount Spent</th>
				</tr>
			</thead>

			<tbody>
				<tr v-for="dailyExpense in daily_expenses" track-by="$index">
					<td>@{{$index+1}}</td>
					<td>
						<a href="/budgets/@{{dailyExpense.budget_id}}/@{{dailyExpense.category}}">
							@{{dailyExpense.category}}
						</a>
					</td>
					<td>@{{dailyExpense.total_spent}}</td>
				</tr>
				<tr>
					<td colspan="2">
						<b class="pull-right">Total Spent</b>
					</td>
					<td>
						@{{totalDailyExpenses}}
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<h5 v-else>You didn't record any expenses yet for this budget...</h5>
</template>