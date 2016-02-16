Vue.component('display-budgets',{
	template:'#budgets_table',

	props:['budgets'],

	
});
Vue.component('display-daily-expenses',{
	template:'#displayDailyExpenses',

	props:['daily_expenses'],

	computed:{
		totalDailyExpenses:function()
		{
			if (this.daily_expenses.length==0) 
			{
				return 0.00; 
			}

			var sum=0; 

			for (var i = this.daily_expenses.length - 1; i >= 0; i--) {
				sum+=parseFloat(this.daily_expenses[i].total_spent); 
			}
			console.log("total daily expenses "+sum); 
			return sum; 
		}
	},

	ready:function(){
		console.log("initialized display daily expenses");
		console.log(this.daily_expenses);  
	}
}); 
Vue.component('expenses-list',{
	template:'#expensesList', 

	props:['expenses'],
}); 
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
Vue.component('track-expenses',{
	template:'#trackExpenses',

	props:['budgets_list'],

	data:function()
	{
		return {
			PieChartData:[], 

		}; 
	}, 

	methods:{
		checkIfUndefined:function(variable)
		{	
			return typeof variable==undefined ? true:false; 
		}, 

		getFirstElement:function()
		{
			return this.budgets_list[0]; 
		}, 

		getMonthlyData:function(id)
		{
			this.$http.get('monthlydata/'+id)
			.then(function(response,status,headers,config)
			{
				console.log("success getting monthly data");

				this.setupPieChartData(response.data);
				var ctx = $("#myChart").get(0).getContext("2d");
				var myPieChart = new Chart(ctx).Pie(this.PieChartData);  
			},
			function(error,status,headers,config)
			{
				console.log("error"); 
			}); 
		}, 

		randomColor:function()
		{
			var colors = [
			'red',
			'blue',
			'grey',
			'aqua',
			'green',
			'black'
			]; 

			console.log("returning random color");
			console.log(colors[this.randomNumber()]);  
			return colors[this.randomNumber()]; 
		}, 

		randomNumber:function()
		{
			console.log("generating random number");
			console.log(" "+Math.floor(Math.random() *5)); 

			return Math.floor(Math.random() * 5); 
		},

		setupPieChartData:function(data)
		{
			console.log("setting up the pie chart data");

			var pieData = []; 

			for (var i = data.length - 1; i >= 0; i--) 
			{
				pieData.push({
					value:data[i].total_spent, 
					// color:'red',
					// highlight:'blue', 
					color:this.randomColor(),
					highlight:this.randomColor(), 
					label:data[i].category 
				}); 
			}

			this.PieChartData = pieData; 

		}


	}, 

	ready:function(){
		console.log("track expenses component is ready"); 

		// var data = {
		// 	labels: ["January", "February", "March", "April", "May", "June", "July"],
		// 	datasets: [
		// 	{
		// 		label: "My First dataset",
		// 		fillColor: "rgba(220,220,220,0.2)",
		// 		strokeColor: "rgba(220,220,220,1)",
		// 		pointColor: "rgba(220,220,220,1)",
		// 		pointStrokeColor: "#fff",
		// 		pointHighlightFill: "#fff",
		// 		pointHighlightStroke: "rgba(220,220,220,1)",
		// 		data: [65, 59, 80, 81, 56, 55, 40]
		// 	},
		// 	{
		// 		label: "My Second dataset",
		// 		fillColor: "rgba(151,187,205,0.2)",
		// 		strokeColor: "rgba(151,187,205,1)",
		// 		pointColor: "rgba(151,187,205,1)",
		// 		pointStrokeColor: "#fff",
		// 		pointHighlightFill: "#fff",
		// 		pointHighlightStroke: "rgba(151,187,205,1)",
		// 		data: [28, 48, 40, 19, 86, 27, 90]
		// 	}
		// 	]
		// };

		// var options={
		// 	 legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].strokeColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"

		// }

		// var ctx = $("#myChart").get(0).getContext("2d");
		// // This will get the first returned node in the jQuery collection.
		// var myLineChart = new Chart(ctx).Bar(data,options);
		// console.log(myLineChart.generateLegend()); 
		
		if (!this.checkIfUndefined(this.budgets_list)) 
		{
			console.log(this.getFirstElement().name+" is selected!"); 

			this.getMonthlyData(this.getFirstElement().id); 


		}

	},

});
Vue.config.debug=true;

new Vue({
	el:'body',

	ready:function(){
		console.log("Vue is working"); 
	}
});
//# sourceMappingURL=all.js.map
