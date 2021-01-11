<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Plantr: an app for growing and harvesting vegetables in New Zealand.">
        <title>Plantr - @yield('title')</title>
        <link rel="shortcut icon" href="/favicon.svg" type="image/x-icon">
        <link rel="preload" href="/fonts/Aadam.otf" as="font" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('app.css')}}">
    </head>
    <body>
        <header>
            <a class="logo" aria-label="Plantr" href="{{route('welcome')}}"><span class="logo-text">Plantr</span><x-svg-plantrlogo /></a>
            <ul>
                <li><a href="{{route('resources')}}">Resources</a></li>
                <li><a href="{{route('about')}}">About</a></li>
                @if (!Auth::check())
                <li class="login"><a class="round-btn" href="{{route('login')}}">Login</a></li>
                @else
                <li><a href="{{route('settings')}}">Settings</a></li>
                @endif
            </ul>
        </header>
    <div class="container" id="container">
            @yield('content')
    </div>
    @if(session('raining'))
        <div id="raining" class="raining-modal-container" id="raining-modal-container">
            <div class="raining-modal">
                <h3 >Time to water your plants</h3>
                <form action="/rain-off" method="POST"> @csrf 
                    <input class="round-btn" value="Okay" type="submit" autofocus> 
                </form>
            </div>
        </div>@endif
    <footer>Copyright Hugh Haworth {{now()->year}} </footer>
    </body>
</html>
