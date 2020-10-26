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
                <li class="logo"><a href="{{route('welcome')}}"><x-svg-plantrlogobig/></a></li>
                <li><a href="{{route('resources')}}">Resources</a></li>
                <li><a href="{{route('about')}}">About</a></li>
                @if (!Auth::check())
                <li><a href="{{route('login')}}">Login</a></li>
                @endif
            </ul>
        </header>
    <div class="container">
            @yield('content')
    </div>
    <footer>Copyright Hugh Haworth {{now()->year}} </footer>
    </body>
</html>
