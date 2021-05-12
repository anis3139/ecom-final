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

mix.js('resources/js/app.js', 'public/js')
.postCss('resources/client/style.css', 'public/css')
.postCss('resources/client/css/dark.css', 'public/css')
.postCss('resources/client/css/swiper.css', 'public/css')
.postCss('resources/client/demos/shop/shop.css', 'public/css')
.postCss('resources/client/demos/shop/css/fonts.css', 'public/css')
.postCss('resources/client/css/font-icons.css', 'public/css')
.postCss('resources/client/css/animate.css', 'public/css')
.postCss('resources/client/css/custom.css', 'public/css')
 



    if (mix.inProduction()) {
        mix.version();
    }