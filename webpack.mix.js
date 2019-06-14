const mix = require('laravel-mix');

const distDir = './public/bundle';

mix.sass('app/assets/scss/index.scss', `${distDir}/bundle.css`)
  .js('app/assets/js/index.js', `${distDir}/bundle.js`)
  .setPublicPath(distDir);
