const mix = require('laravel-mix');
const Dotenv = require('dotenv-webpack');
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

mix.react('resources/js/app.js', 'public/js')
   .sass('resources/sass/main/main.scss', 'public/css')
   .sass('resources/sass/admin/admin.scss', 'public/css')
    .webpackConfig({
        plugins: [
            new Dotenv({path:'./front.env'})
        ],
    });
