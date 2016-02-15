<template id="expensesList">
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Date</th>
					<th>Amount</th>
				</tr>
				<tbody>
					<tr v-for="expense in expenses" track-by="$index">
						<td>@{{$index+1}}</td>
						<td>@{{expense.name}}</td>
						<td>@{{ expense.date}}</td>
						<td>@{{ expense.amount}}</td>
					</tr>
				</tbody>
			</thead>
		</table>
	</div>
</template>