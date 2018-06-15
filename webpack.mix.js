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

// mix.js('resources/assets/js/app.js', 'public/js')
//    .sass('resources/assets/sass/app.scss', 'public/css');

mix.combine([
    'resources/assets/AdminLTE-2.4.3/bower_components/bootstrap/dist/css/bootstrap.min.css',
    'resources/assets/AdminLTE-2.4.3/bower_components/font-awesome/css/font-awesome.min.css',
    'resources/assets/AdminLTE-2.4.3/bower_components/Ionicons/css/ionicons.min.css',
    'resources/assets/AdminLTE-2.4.3/dist/css/AdminLTE.min.css',
    'resources/assets/AdminLTE-2.4.3/dist/css/skins/_all-skins.min.css',
    'resources/assets/AdminLTE-2.4.3/plugins/iCheck/square/blue.css',
    'resources/assets/AdminLTE-2.4.3/bower_components/datatables.net-responsive/js/dataTables.bootstrap.min.js',
    'resources/assets/AdminLTE-2.4.3/bower_components/datatables.net-responsive-bs/css/responsive.bootstrap.min.css',
   
], 'public/css/app.min.css');

mix.combine([
    'resources/assets/AdminLTE-2.4.3/bower_components/jquery/dist/jquery.min.js',
    'resources/assets/AdminLTE-2.4.3/bower_components/bootstrap/dist/js/bootstrap.min.js',
    'resources/assets/AdminLTE-2.4.3/bower_components/datatables.net/js/jquery.dataTables.min.js',
    'resources/assets/AdminLTE-2.4.3/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js',
    'resources/assets/AdminLTE-2.4.3/bower_components/jquery-slimscroll/jquery.slimscroll.min.js',
    'resources/assets/AdminLTE-2.4.3/bower_components/fastclick/lib/fastclick.js',
    'resources/assets/AdminLTE-2.4.3/dist/js/adminlte.min.js',
    'resources/assets/AdminLTE-2.4.3/plugins/iCheck/icheck.min.js',
    'resources/assets/AdminLTE-2.4.3/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js',
    
], 'public/js/app.min.js');

mix.combine([
    'resources/assets/AdminLTE-2.4.3/bower_components/bootstrap/dist/css/bootstrap.min.css',
], 'public/css/bootstrap.min.css');