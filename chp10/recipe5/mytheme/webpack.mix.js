let mix = require('laravel-mix');

mix.js('src/scripts.js', 'dist/');
mix.css('src/styles.css', 'dist/', [
  require('postcss-preset-env')
]);
