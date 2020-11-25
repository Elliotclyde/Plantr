<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Plantr - @yield('title')</title>
        <link rel="shortcut icon" href="/favicon.svg" type="image/x-icon">
        <link rel="stylesheet" href="{{asset('app.css')}}">
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>
        <script src="https://cdn.jsdelivr.net/gh/mattkingshott/iodine@3/dist/iodine.min.js" ></script>
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
