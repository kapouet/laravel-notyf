const mix = require('laravel-mix');

mix
    .setPublicPath('dist')
    .js('resources/js/notyf.js', 'js')
    .sass('resources/sass/notyf.scss', 'css')
    .sourceMaps()
;

if (mix.inProduction()) {
    mix.version();
}
