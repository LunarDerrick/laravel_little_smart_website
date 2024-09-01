const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .babelConfig({
        presets: ['@babel/preset-env'],
        plugins: ['@babel/plugin-transform-modules-commonjs'],
    })
    // .sass('resources/sass/app.scss', 'public/css')
    .styles([
        // remember to add directory for every new css file
        // and do "npm run dev" in terminal to compile these changes
       'resources/css/bootstrap.min.css',
       'resources/css/ckeditor.css',
       'resources/css/feedback.css',
       'resources/css/form.css',
       'resources/css/graph.css',
       'resources/css/main.css',
       'resources/css/query.css',
    ], 'public/style.css')
    .copyDirectory('resources/js/ckeditor', 'public/js/ckeditor')
    .version();
