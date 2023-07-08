let mix = require("laravel-mix");

mix.autoload({
    jquery: ["$", "jQuery", "window.jQuery"],
});

mix.webpackConfig({
    stats: {
        children: true,
    },
})
    .sass("resources/css/landing.scss", "public/assets/css/")
    .sass("resources/css/dashboard.scss", "public/assets/css/")
    .js("resources/js/landing.js", "public/assets/js/")
    .js("resources/js/dashboard.js", "public/assets/js/")
    .copy("resources/js/landing_lib", "public/assets/js/landing_lib/")
    .copy("resources/js/dashboard_lib", "public/assets/js/dashboard_lib/")
    .copy("resources/images", "public/assets/images/");
