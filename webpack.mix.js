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

mix.js('resources/assets/js/app.js', 'public/js').sourceMaps().version();
mix.sass('resources/assets/sass/style.scss', 'public/css/style2.css').sourceMaps().version();
// mix.less('resources/assets/less/style.less', 'public/css/style.css');
// mix.less('resources/assets/less/critical_style.less', 'public/css/critical_style.css');

// mix.copy('resources/assets', 'public/assets');