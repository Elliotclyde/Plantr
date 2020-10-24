<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Plantr - @yield('title')</title>

        <link rel="stylesheet" href="{{asset('app.css')}}">
    </head>
    <body>
        <header>
            <ul>
                <a href="{{route('welcome')}}"><x-svg-plantrlogobig/></a>
                <a href="{{route('resources')}}">Resources</a>
                <a href="{{route('about')}}">About</a>
                @if (!Auth::check())
                <a href="{{route('login')}}">Login</a>
                @endif
            </ul>
        </header>
    <div class="container">
            @yield('content')
    </div>
    <footer>Copyright Hugh Haworth {{now()->year}} </footer>
    </body>
</html>
