let mix = require("laravel-mix");

// mix.copy("node_modules/jquery/dist/jquery.min.js", "public/js");
// mix.copy("node_modules/jquery-ui-dist/jquery-ui.js", "public/js");
// mix.copy(
//     "node_modules/jquery-ui-multidatespicker/jquery-ui.multidatespicker.js",
//     "public/js"
// );
// mix.copy("node_modules/jquery-ui-dist/jquery-ui.css", "public/css");

// mix.copy(
//     "node_modules/jquery-ui-multidatespicker/jquery-ui.multidatespicker.css",
//     "public/css"
// );

mix.js("resources/assets/js/app.js", "public/js").sass(
    "resources/assets/sass/app.scss",
    "public/css"
);
