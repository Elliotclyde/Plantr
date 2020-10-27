<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Plantr - @yield('title')</title>
        <link rel="stylesheet" href="{{asset('app.css')}}">
    </head>
    <body>
    <div class="container">
            @yield('content')
    </div>
    <footer>Copyright Hugh Haworth {{now()->year}} </footer>
    </body>
</html>
