Vue.component('track-expenses',{
	template:'#trackExpenses',

	props:['budgets_list'],

	data:function()
	{
		return {
			monthlyExpensesChart:
			{
				labels:[], 
				datasets:
				[

				]
			}
		}; 
	}, 

	methods:{

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
		console.log(" "+this.budgets_list); 

	},

});