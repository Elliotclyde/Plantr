    @extends('layouts.noheader')

    @section('title', 'Login')

    @section('content')
    <h1 class="hidden-heading">Plantr 2.0 Login</h1>
    <form action="/login" method="post">
    <p class="logo-no-header"><span class="logo-text-no-header">Plantr</span><x-svg-plantrlogo/></p>
    @csrf
    <label for="username">Username</label>
    <input type="username" name="username" id="username">
    <label for="password">Password</label>
    <input type="password" name="password" id="password">
    <input class="round-btn" type="submit" value="Log in">
    </form>
    <div class="home-link"><a  href="{{route('welcome')}}">Home</a></div>
    @endsection