let mix = require('laravel-mix');

mix.browserSync('127.0.0.1:8000');

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');

mix.autoload({
    jquery: ['$', 'window.jQuery']
});