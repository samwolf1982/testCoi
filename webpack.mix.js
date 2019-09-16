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
   .sass('resources/assets/sass/app.scss', 'public/css');

// макет
// js
mix.js('resources/assets/ui-ecommerce/js/jquery-2.0.0.min.js', 'public/ui-ecommerce/js')
mix.js('resources/assets/ui-ecommerce/js/bootstrap.bundle.min.js', 'public/ui-ecommerce/js')
mix.js('resources/assets/ui-ecommerce/plugins/fancybox/fancybox.min.js', 'public/ui-ecommerce/js/plugins/fancybox')
mix.js('resources/assets/ui-ecommerce/plugins/owlcarousel/owl.carousel.js', 'public/ui-ecommerce/js/plugins/owlcarousel')
mix.js('resources/assets/ui-ecommerce/js/script.js', 'public/ui-ecommerce/js')


// css
 mix.less('resources/assets/ui-ecommerce/css/bootstrap.less', 'public/ui-ecommerce/css')
 mix.sass('resources/assets/ui-ecommerce/fonts/fontawesome/scss/fontawesome.scss', 'public/ui-ecommerce/fonts')
 mix.less('resources/assets/ui-ecommerce/fonts/fontawesome/css/fontawesome-all.less', 'public/ui-ecommerce/fonts')
 mix.less('resources/assets/ui-ecommerce/plugins/fancybox/fancybox.min.less', 'public/ui-ecommerce/css/plugins/fancybox')
 mix.less('resources/assets/ui-ecommerce/plugins/owlcarousel/assets/owl.carousel.less', 'public/ui-ecommerce/css/plugins/owlcarousel')
 mix.less('resources/assets/ui-ecommerce/plugins/owlcarousel/assets/owl.theme.default.less', 'public/ui-ecommerce/css/plugins/owlcarousel')
 mix.less('resources/assets/ui-ecommerce/css/ui.less', 'public/ui-ecommerce/css')
 mix.less('resources/assets/ui-ecommerce/css/responsive.less', 'public/ui-ecommerce/css')


// mix.styles(
//  'resources/assets/ui-ecommerce/fonts/fontawesome/css/fontawesome-all.css', 'public/ui-ecommerce/fonts/fontawesome-all.css');

