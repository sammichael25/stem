let mix = require('laravel-mix');

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
    .sass('resources/assets/sass/app.scss', 'public/css')
    .js('node_modules/jquery/dist/jquery.min.js', 'public/js')
    .js('node_modules/fullcalendar/dist/fullcalendar.js', 'public/js')
    .js('node_modules/fullcalendar-scheduler/dist/scheduler.js', 'public/js')
    .js('node_modules/fullcalendar/dist/gcal.js', 'public/js')
    .js('node_modules/sweetalert2/dist/sweetalert2.all.min.js', 'public/js')
    .js('node_modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.js', 'public/js')
    .copy('node_modules/fullcalendar/dist/fullcalendar.css', 'public/css/fullcalendar.css')
    .copy('node_modules/fullcalendar/dist/fullcalendar.print.css', 'public/css/fullcalendar.print.css')
    .copy('node_modules/fullcalendar-scheduler/dist/scheduler.css', 'public/css/scheduler.css')
    .copy('node_modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.css', 'public/css/bootstrap-colorpicker.css')