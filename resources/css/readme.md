# Plantr CSS

The CSS in this project gets bundled using [Laravel mix](https://laravel-mix.com/), a wrapper for webpack.

The entry-point of the CSS is "app.postcss"

These styles also get run through a couple of postCSS plugins:

-   [PostCSS-for](https://github.com/antyakushev/postcss-for) which provides looping for the animation styling.
-   [PostCSS-nesting](https://github.com/csstools/postcss-nesting) which allows nesting.

The CSS is divided between:

-   Global styles (including animation primatives)
-   Reusable components which are in multiple pages
-   Page-specific CSS where the names of the files match the laravel blade templates

It also uses CSS variables, which I could compile into polyfills with postCSS but I'm using [Alpine.JS](https://github.com/alpinejs/alpine/) which doesn't support IE 11 anyway, so I thought it wasn't worth the hassle.
