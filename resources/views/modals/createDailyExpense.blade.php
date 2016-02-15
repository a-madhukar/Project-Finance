@inject('budgets','App\Budget')
@inject('categories','App\Http\Utilities\Category')

<div 
class="modal fade createDailyExpenseModal" 
tabindex="-1" 
role="dialog" 
aria-labelledby="createDailyExpenseModalLabel" >
	<div class="modal-dialog" role="document">
		<div class="modal-content">

			<div class="modal-header">
				<button 
				type="button" 
				class="close" 
				data-dismiss="modal" 
				aria-label="Close"
				><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="createDailyExpenseModalLabel">
					Record Your Daily Expense
				</h4>
			</div>
			
			@if(count($budgets::lists('name','id')))
				<form action="{{url('dailyexpense')}}" method="POST">
					<div class="modal-body">
						@include('partials._dailyExpense')
					</div>

					<div class="modal-footer">
						<div class="form-group">
							<button class="btn btn-primary center-block">Record Expense</button>
						</div>
					</div>
				</form>
			@else
				<div class="modal-body">
					<div class="alert alert-danger">
						<ul>
							<li>You need to create a new budget before recording your daily expenses</li>
						</ul>
					</div>
				</div>
			@endif
		</div>
	</div>
</div>