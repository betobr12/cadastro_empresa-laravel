const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix

.scripts('node_modules/jquery/dist/jquery.js','public/js/jquery.js')
.scripts('node_modules/bootstrap/dist/js/bootstrap.bundle.js','public/js/bootstrap.js')
.sass('resources/views/scss/styles.scss','public/css/styles.css')
.scripts('node_modules/sweetalert2/dist/sweetalert2.min.css','public/css/sweetalert2.min.css');
