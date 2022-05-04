let mix = require('laravel-mix');

mix.js('src/scripts.js', 'dist/');
mix.css('src/styles.css', 'dist/', [
  require('postcss-preset-env')
]);
mix.browserSync({
  proxy: 'mysite.ddev.site:80',
  files: [
    'dist/styles.css',
    'dist/scripts.js',
  ]
});
