<div class="row">
	<div class="col-md-12">
		<div class="col-md-4 col-md-offset-4">
			{{csrf_field()}}

			<div class="form-group">
				<label for="name">Name: </label>
				<input 
				type="text" 
				class="form-control" 
				id="name" 
				name="name" 
				placeholder="eg: January" 
				autocomplete="off"
				>
			</div>

			<div class="form-group">
				<label for="amount">Amount</label>
				<input 
				type="number" 
				class="form-control" 
				id="amount" 
				name="amount" 
				min="0" 
				step="0.01"
				autocomplete="off"
				placeholder="0.00"
				>
			</div>

			<div class="form-group">
				<div class="row">
					<div class="col-md-6">
						<label for="start_date">Start Date:</label>
						<input 
						type="date" 
						class="form-control" 
						id="start_date"
						name="start_date"
						>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label for="end_date">End Date:</label>
							<input 
							type="date" 
							class="form-control" 
							id="end_date"
							name="end_date"
							>
						</div>
					</div>
				</div>
			</div>	
		</div>
	</div>
</div>
