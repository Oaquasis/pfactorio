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

//mix.js('resources/assets/js/unify.js', 'public/js')
mix.copy('node_modules/pace-progress/pace.min.js', 'public/js/pace.min.js')
    .copy('resources/assets/sass/fontawesome/webfonts/', 'public/fonts/vendor/fontawesome')
    .js('resources/assets/js/jquery.js', 'public/js')
    .js('resources/assets/js/popper.js', 'public/js')
    .js('resources/assets/js/bootstrap.js', 'public/js')
    .less('resources/assets/less/bootstrap.less', 'public/css')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .sass('resources/assets/sass/fontawesome/fontawesome.scss', 'public/css');
