const {mix} = require('laravel-mix');

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

mix.sass('resources/assets/sass/font-awesome.scss', 'public/css')
    .sass('resources/assets/sass/bootstrap.scss', 'public/css')
    .sass('resources/assets/sass/theme.scss', 'public/css')
    .sass('resources/assets/sass/form.scss', 'public/css')
    .sass('resources/assets/sass/app.scss', 'public/css')

    .styles([
        'public/css/bootstrap.css',
        'public/css/font-awesome.css',
        'resources/assets/templates/nifty/v2.6/css/nifty.min.css',
        'public/css/theme.css',
        'public/css/form.css',
        'public/css/app.css'
    ], 'public/css/main.css')

    .js('resources/assets/js/app/index.js', 'public/js/app')
    .js('resources/assets/js/app/auth/login.js', 'public/js/app/auth')
    .js('resources/assets/js/app/auth/register.js', 'public/js/app/auth')

