<td>
	<input 
	type="date" 
	class="form-control"
	v-model="deadline"
	>
</td>
<td>
	<select 
	type="text" 
	class="form-control"
	name="category"
	placeholder="eg: Food"
	v-model="category"
	>
	<option value="" disabled selected>eg: Food</option>
	@foreach($categories::all() as $category)
	<option value="{{$category}}">{{$category}}</option>
	@endforeach
</select>
</td>
<td>
	<input 
	type="number" 
	class="form-control"
	placeholder="eg: 20.00"
	step="0.01"
	v-model="amount"
	>
</td>


<td>
	<button 
	class="btn btn-primary" 
	disabled="@{{toggleDisabled}}" 
	v-if="typeof planned_expenditures == 'undefined' "
	@click="addExpenditure">
	Add 
</button>
<button 
class="btn btn-primary" 
disabled="@{{toggleDisabled}}" 
v-else
@click="persistExpenditure">
Add 
</button>
</td>