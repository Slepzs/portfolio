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
    .vue()
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('@tailwindcss/jit'),
        require('autoprefixer'),
    ])
    .webpackConfig(require('./webpack.config'));

mix.browserSync({
    host: '192.168.10.10',
    proxy: 'portfolio.test',
    open: false,
    files: [
        'app/**/*.php',
        'resources/views/**/*.php',
        'resources/js/**/*.js',
        'packages/mixdinternet/frontend/src/**/*.php',
        'public/js/**/*.js',
        'public/css/**/*.css'
    ],
    watchOptions: {
        usePolling: true,
        interval: 500
    }
});

if (mix.inProduction()) {
    mix.version();
}
