const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js').postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
]);

// mix.sass('resources/sass/app.sass', 'public/css');

// if (mix.inProduction()) {
//     mix.version()
//         .sourceMaps();
// }
