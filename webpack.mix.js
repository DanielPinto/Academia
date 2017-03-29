const { mix } = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');

mix.copy('node_modules/gentelella/vendors/bootstrap/dist/css/bootstrap.min.css', 'public/css')
  .copy('node_modules/gentelella/vendors/font-awesome/css/font-awesome.min.css', 'public/css')
  .copy('node_modules/gentelella/build/css/custom.min.css', 'public/css');

mix.copy('node_modules/gentelella/vendors/jquery/dist/jquery.min.js', 'public/js')
  .copy('node_modules/gentelella/vendors/bootstrap/dist/js/bootstrap.min.js', 'public/js')
  .copy('node_modules/gentelella/vendors/fastclick/lib/fastclick.js', 'public/js')
  .copy('node_modules/gentelella/vendors/nprogress/nprogress.js', 'public/js')
  .copy('node_modules/gentelella/build/js/custom.min.js', 'public/js');
