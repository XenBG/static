const mix = require('laravel-mix');
const MixGlob = require('laravel-mix-glob');
const mixGlob = new MixGlob({ mix });

mix.setPublicPath('public');

// Copy fonts to public directory

mix.copy('resources/fonts/**/*.{eot,svg,ttf,woff,woff2}', 'public/fonts/');

// Process individual page styles & scripts

mixGlob.sass('resources/scss/pages/*.scss', 'public/css', null, {
        outputDir: 'resources/scss/',
    })
    .js('resources/js/pages/*.js', 'public/js', null, {
        outputDir: 'resources/js/',
    })
    .mix('options')({
        processCssUrls: false
    });

mix.webpackConfig({
    resolve: {
        modules: [
            'node_modules'
        ],
        alias: {
            jscookie: 'js-cookie/src/js.cookie.js',
            validator: 'jquery-validation/dist/jquery.validate.min.js',
        }
    }
});

mix.autoload({
    jquery: ['$', 'window.jQuery', 'jQuery'],
    jscookie: ['Cookies', 'window.Cookies'],
    validator: ['validator', 'window.validator'],
});

mix.extract(['jquery', 'js-cookie', 'jquery-validation']);

mix.version();