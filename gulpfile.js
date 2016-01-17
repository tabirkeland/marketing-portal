var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
	mix.less('app.less', 'public/css', {
	        paths: [
				'node_modules/bootstrap/less',
				'node_modules/font-awesome/less'
		    ]
	    })
		.styles('normalize.css')
		.styles(['portal.css', 'timeline.css'], 'public/css/portal.css')
		.copy('./node_modules/font-awesome/fonts', 'public/fonts')
		.copy('./node_modules/bootstrap/fonts', 'public/fonts')
		.scripts('portal.js')
    	.browserify('app.js');
});
