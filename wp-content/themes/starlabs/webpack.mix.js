const mix = require('laravel-mix');
require('mix-tailwindcss');

mix.postCss('tailwind.css', 'public/css').tailwind();