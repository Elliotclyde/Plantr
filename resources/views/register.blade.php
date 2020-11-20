@extends('layouts.main')

@section('title', 'Register')

@section('content')
<form  action="/register" method="POST" >
    @csrf
    <p class="logo-no-header"><span class="logo-text-no-header">Plantr</span><x-svg-plantrlogo/></p>
    <label for="name">Name</label>
    <input id="name" type="text" name="name" placeholder="Name">
    <label for="username">Username</label>
    <input id="username" type="text" name="username" placeholder="Username">
    <label for="email">Email</label>
    <input id="email" type="email" name="email" placeholder="Email address">
    <label for="password">Password</label>
    <input id="password" type="password" name="password" placeholder="Password">
    <label for="password-confirm">Confirm Password</label>
    <input id="password-confirm" type="password" name="password_confirmation" placeholder="Confirm Password">
    <input class="round-btn" type="submit" value="Register">

    @if($errors->any())
    <div class="form-error" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>

        @foreach($errors->all() as $error)
            {{ $error }}<br/>
        @endforeach
    </div>

@endif

</form>

@endsection