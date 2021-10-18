const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Eduka asset management using Laravel Mix
 |--------------------------------------------------------------------------
 |
 */
mix.copy('resources/js/retina.min.js', 'resources/overrides/public/vendor/mastering-nova/js')
   .postCss('resources/css/app.css', 'resources/overrides/public/vendor/mastering-nova/css', [
      require("tailwindcss")
   ]);
