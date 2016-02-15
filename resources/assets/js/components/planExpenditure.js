Vue.component('plan-expenditure',{
	template:'#planExpenditures',

	props:['planned_expenditures','budget'],

	data:function()
	{
		return {
			category:'',
			amount:'',
			deadline:'',

			response:'',

			expenditures:[]
		};
	},

	computed:
	{
		toggleDisabled:function()
		{
			if (this.category===''|| this.amount==='' || this.deadline==='') {
				return true; 
			}

			return false;
		},
		
		serializeExpenditure:function()
		{
			if (this.expenditures.length>0) 
			{
				return JSON.stringify(this.expenditures); 
			}

			return this.expenditures
		}, 

		totalPlannedExpenditure:function()
		{
			if (this.expenditures.length===0) 
			{	
				return 0.00; 
			}

			var sum=0;

			for (var i = this.expenditures.length - 1; i >= 0; i--) {
			 	sum+= parseFloat(this.expenditures[i].amount); 
			 }

			 return parseFloat(sum); 
		}
	}, 

	methods:
	{
		addExpenditure:function()
		{
			var expenditure={
				'category':this.category,
				'amount':this.amount,
				'deadline':this.deadline
			}; 

			this.expenditures.push(expenditure); 

			console.log("pushed into array"); 
			console.log(expenditure.category);
			console.log(expenditure.amount);
			console.log(expenditure.deadline); 

			//this.$dispatch('add-expenditure',expenditure);

			this.clearInput(); 			
		},

		clearInput:function(){
			this.category='';
			this.amount='';
			this.deadline='';
		}, 

		persistExpenditure:function()
		{
			console.log("preparing to persist the data");
			console.log("Budget id "+this.budget.id); 
			var expenditure={
				'budget_id':this.budget.id,
				'category':this.category,
				'amount':this.amount,
				'deadline':this.deadline
			};  

			this.postExpenditure('/expenditure',expenditure); 
		}, 

		postExpenditure:function(url, data)
		{
			//var _response; 

			this.$http.post(url,data).then(function(response,status,headers,config)
				{	
					console.log("posting data to server");
					console.log("returning the response "+response.data);  
					this.expenditures.push(response.data);
					this.clearInput();  
				},function(error,status,headers,config)
				{
					console.log("received error from server");
					console.log("error");  
				}.bind(this)); 

		}

	},

	ready:function(){
		if (typeof this.planned_expenditures != 'undefined') 
		{
			console.log("planned expenditures is not undefined");
			console.log(this.planned_expenditures); 
			this.expenditures=this.planned_expenditures; 
		}
		console.log("planned_expenditures "+typeof this.planned_expenditures); 
		console.log(this.budget); 
	}

});