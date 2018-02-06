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

// Copy files
mix.copy('node_modules/pace-progress/pace.min.js', 'public/js/pace.min.js')
    .copy('resources/assets/sass/fontawesome/webfonts/', 'public/fonts/vendor/fontawesome');

// Javascript
mix.js('resources/assets/js/app.js', 'public/js');

// Styling
mix.less('resources/assets/less/bootstrap.less', 'public/css')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .sass('resources/assets/sass/fontawesome/fontawesome.scss', 'public/css');
