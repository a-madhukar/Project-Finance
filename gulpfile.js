var elixir = require('laravel-elixir');

var paths={
	'chartsjs':'./node_modules/chart.js/Chart.js'
} 

elixir(function(mix) {
    mix.sass('app.scss')
    	.scripts(['components/*.js','app.js'],'public/js/all.js')
    	.scripts([paths.chartsjs],'public/js/charts.js');
});
