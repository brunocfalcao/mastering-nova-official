const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Eduka asset management using Laravel Mix
 |--------------------------------------------------------------------------
 |
 */
mix
   .js('resources/js/app.js', 'public/vendor/mastering-nova/js')
   .postCss('resources/css/app.tailwind.css', 'public/vendor/mastering-nova/css', [
      require("tailwindcss")
   ]);