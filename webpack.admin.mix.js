const mix = require("laravel-mix");
require("laravel-mix-merge-manifest");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
mix.webpackConfig({
    resolve: {
        alias: {
            "@": path.resolve(__dirname, "modules/admin/resources/js/")
        }
    }
});
mix.js("modules/admin/resources/js/app.js", "public/js/admin")
    .sass("modules/admin/resources/sass/app.scss", "public/css/admin")
    .mergeManifest();
