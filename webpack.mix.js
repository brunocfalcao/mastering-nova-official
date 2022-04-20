const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Eduka asset management using Laravel Mix
 |--------------------------------------------------------------------------
 |
 */
mix
   .js('resources/js/app.js', 'public/vendor/mastering-nova/js')
   .copy('resources/js/retina.min.js', 'public/vendor/mastering-nova/js')
   .copy('resources/js/owl.carousel.min.js', 'public/vendor/mastering-nova/js')
   .copy('resources/js/fitvids.js', 'public/vendor/mastering-nova/js')
   .copy('resources/js/move-to.min.js', 'public/vendor/mastering-nova/js')
   .copy('resources/js/template.js', 'public/vendor/mastering-nova/js')
   .copy('resources/js/perfect-scrollbar.js', 'public/vendor/mastering-nova/js')
   .copy('resources/css/perfect-scrollbar.css', 'public/vendor/mastering-nova/css')
   .copy('resources/css/owl.carousel.min.css', 'public/vendor/mastering-nova/css')
   .copy('resources/css/owl.theme.default.min.css', 'public/vendor/mastering-nova/css')
   .postCss('resources/css/app.tailwind.css', 'public/vendor/mastering-nova/css', [
      require("tailwindcss")
   ]);