const mix = require('laravel-mix');
const resources = 'src';
const templates = 'templates';
const web = 'public';
const assets = web + '/assets';
const purgeContent = [
  "templates/**/*.php",
  "templates/**/*.twig",
  "templates/**/*.html",
  "templates/**/*.json",
  "templates/**/*.js",
  "templates/**/*.rss",
  "src/js/**/*.js",
];
require('laravel-mix-purgecss');
const purgeExclude = require('./purge.mix.js');

// require('laravel-mix-polyfill');
mix.options({
  postCss: [
    require('autoprefixer')({
      cascade: false
    })
  ]
})

mix.babelConfig({
  plugins: ['transform-es2015-arrow-functions', 'transform-es2015-for-of']
});

mix.webpackConfig({
  module:
  {
    rules:
    [
      {
        test: /\.js?$/,
        exclude: /(bower_components)/,
        use:
        [
          {
            loader: 'babel-loader',
            options: mix.config.babel()
          }
        ]
      },
      {
        test: /mailcheck/,
        use: 'imports-loader?jQuery=jquery,$=jquery,this=>window'
      }
    ]
  }
});

mix.autoload({
  jquery: ['$', 'window.$', 'window.jQuery'],
  'slick-carousel': ['slick', 'window.slick'],
});

mix.setPublicPath(assets);
mix.setResourceRoot('../');

mix
  .js([
    `${resources}/js/main.js`,
  ], `${assets}/js`);
// .polyfill({
//   enabled: true,
//   useBuiltIns: "usage",
//   targets: false
// });

mix.sass(`${resources}/scss/styles.scss`, `${assets}/css`, {
  includePaths: ['node_modules']
}).options({
  processCssUrls: false,
}).purgeCss({
  enabled: (process.env.PURGE == "true" ? true : false),
  content: purgeContent,
  safelist: { standard: purgeExclude.whitelist }
});


// mix.copy(`${resources}/fonts`, `${assets}/fonts`);
// mix.copy(['templates/_includes/css/crucial.css', 'templates/_includes/css/crucial.css.map'], `${assets}/css`);
// mix.copy(`${resources}/images`, `${assets}/images`);

// Hash and version files in production.
// if (mix.config.inProduction) {
mix.version();
// }

// Generate source maps
// mix.webpackConfig({
//   devtool: 'source-map'
// })
// .sourceMaps();

/*
if 'files' isn't specified, it will auto-reload when the processed files (CSS & JS) are changed. It won't detect the templates folder however. Specifying this option manually means you need to include ALL the paths you want to watch for changes, not just the ADDITIONAL paths.
*/
mix.browserSync({
  proxy: process.env.PRIMARY_SITE_URL,
  files: [
    // WORKS
    web + '/assets/css/app.css',
    web + '/assets/css/crucial.css',
    web + '/assets/js/app.js',
    'templates/**/*',
    'src/scss/**/*',
    'src/js/**/*',
    web + '/assets/css/**/*.css',
    web + '/assets/js/**/*.js'
  ],
  browser: "chrome"
});

// Shows one 'Build Success' message and goes silent unless there's an error.
mix.disableSuccessNotifications();