var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function (mix) {
    mix.less('app.less', 'public/assets/css');
    mix.styles(['app.css'], 'public/assets/css/all.css', 'public/assets/css');
    mix.scripts(['vendor/jquery.min.js', 'vendor/bootstrap.min.js', 'ui-basic.js'], 'public/assets/js/all.js');
    mix.version(['public/assets/css/all.css', 'public/assets/js/all.js']);
});
