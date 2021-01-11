<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Plantr: an app for growing and harvesting vegetables in New Zealand.">
        <meta property="og:title" content="Plantr - @yield('title')">
        <meta property="og:description" content="Plantr: an app for growing and harvesting vegetables in New Zealand.">
        <meta property="og:image" content="images/plantrpreview.jpg">
        <meta property="og:url" content="{{env('APP_URL')}}">
        <meta name="twitter:card" content="summary_large_image">
        <title>Plantr - @yield('title')</title>
        <link rel="preload" href="fonts/Aadam.otf" as="font" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('app.css')}}">
        <link rel="shortcut icon" href="/favicon.svg" type="image/x-icon">
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>
        <script src="https://cdn.jsdelivr.net/gh/mattkingshott/iodine@3/dist/iodine.min.js" ></script>
        <script src="/scripts/scripts.js" ></script>
    </head>
    <body>
    <div class="container" id="container">
            @yield('content')
    </div>
    <footer>Copyright Hugh Haworth {{now()->year}} </footer>
    </body>
</html>
