@inject('categories','App\Http\Utilities\Category')

<template id="planExpenditures">
	<table class="table table-striped table-responsive">
		<thead>
			<tr>
				<th>Pay On</th>
				<th>Category</th>
				<th colspan="2">Amount</th>
				
			</tr>
		</thead>
	
		<tbody>
			<tr v-for="expenditure in expenditures">
				<td>@{{expenditure.deadline}}</td>
				<td>@{{expenditure.category}}</td>
				<td colspan="2">@{{expenditure.amount}}</td>
			</tr>
			
			<tr>
				@include('partials._expenditureInput')
			</tr>

			<tr v-show="totalPlannedExpenditure > 0">
				<td colspan="2"><b class="pull-right">Total:</b></td>
				<td>@{{totalPlannedExpenditure}}</td>
			</tr>
		</tbody>
	</table>
	<input type="hidden" name="expenditures" id="expenditures" value="@{{serializeExpenditure}}">
</template>