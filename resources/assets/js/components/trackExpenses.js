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