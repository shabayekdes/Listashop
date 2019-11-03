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
            "@Admin": path.resolve(
                __dirname,
                "packages/admin/src/resources/js/"
            )
        }
    }
});
mix.js("packages/admin/src/resources/js/app.js", "public/js/admin")
    .sass("packages/admin/src/resources/sass/app.scss", "public/css/admin")
    .mergeManifest();
