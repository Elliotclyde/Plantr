    @extends('layouts.main')

    @section('title', 'Login')

    @section('content')
    <h1>Plantr 2.0 Login</h1>
    <form action="/login" method="post">
    @csrf
    <label for="username">Username</label>
    <input type="username" name="username" id="username">
    <label for="password">Password</label>
    <input type="password" name="password" id="password">
    <input type="submit" value="submit">
    </form>
    <a href="{{route('welcome')}}">Home</a>
    @endsection