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
.styles(['resources/client/style.css', 'resources/client/css/dark.css', 'resources/client/css/swiper.css','resources/client/demos/shop/shop.css', 'resources/client/demos/shop/css/fonts.css', 'resources/client/css/font-icons.css', 'resources/client/css/animate.css', 'resources/client/css/custom.css'], 'public/css/app.css')

 



    if (mix.inProduction()) {
        mix.version();
    }