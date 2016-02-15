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