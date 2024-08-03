const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */


   
mix.styles([
    'resources/css/bootstrap.min.css',
    'resources/css/toastr.css',
    'resources/css/app.css'
],'public/blog/css/app.css');
mix.scripts([
    'resources/js/jquery.min.js',
    'resources/js/bootstrap.bundle.min.js',
    'resources/js/sweetalert.min.js',
    'resources/js/toastr.min.js',
    'resources/js/custom.js',
],'public/blog/js/app.js');