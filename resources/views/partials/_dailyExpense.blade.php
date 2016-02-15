{{csrf_field()}}
<div class="form-group">
	<label for="budget">Budget:</label>
	<select 
	name="budget_id" 
	id="budget"
	class="form-control"
	>
	@foreach($budgets::lists('name','id') as $id => $budget)
	<option value="{{$id}}">{{$budget}}</option>
	@endforeach
</select>
</div>

<div class="form-group">
	<label for="category">Category:</label>
	<select 
	name="category" 
	id="category"
	class="form-control"
	>
	@foreach($categories::all() as $category)
	<option value="{{$category}}">{{$category}}</option>
	@endforeach
</select>
</div>

<div class="form-group">
	<label for="name">Name:</label>
	<input 
	type="text" 
	class="form-control" 
	id="name"
	name="name"
	placeholder="eg: Burger King"
	autocomplete="off"
	>
</div>

<div class="form-group">
	<label for="amount">Amount:</label>
	<input 
	type="number" 
	class="form-control" 
	id="amount"
	name="amount"
	placeholder="eg: 10.50"
	min="0"
	step="0.01"
	autocomplete="off"
	>
</div>

<div class="form-group">
	<label for="date">Date:</label>
	<input 
	type="date" 
	class="form-control" 
	id="date"
	name="date"
	>
</div>