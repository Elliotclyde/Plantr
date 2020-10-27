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
            <a class="logo" href="{{route('welcome')}}"><span class="logo-text">Plantr</span><x-svg-plantrlogo/></a>
            <ul>
                
                <li><a href="{{route('resources')}}">Resources</a></li>
                <li><a href="{{route('about')}}">About</a></li>
                @if (!Auth::check())
                <li class="login"><a class="round-btn" href="{{route('login')}}">Login</a></li>
                @endif
            </ul>
        </header>
    <div class="container">
            @yield('content')
    </div>
    <footer>Copyright Hugh Haworth {{now()->year}} </footer>
    </body>
</html>
