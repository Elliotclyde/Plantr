    @extends('layouts.noheader')

    @section('title', 'Login')

    @section('content')
    <h1 class="hidden-heading">Plantr 2.0 Login</h1>
    <form  action="/login" method="POST" x-data="form()" x-init="init()" @focusout="change" @input="change" @submit="submit">
        <p class="logo-no-header"><span class="logo-text-no-header">Plantr</span><x-svg-plantrlogo/></p>
    @csrf
        <label for="username">Username</label>
        <input name="username" id="username" type="text" value="{{old('username')}}"
         x-bind:class="{'invalid':username.errorMessage}" data-rules='["required"]' data-server-errors='{!! json_encode($errors->get('username'))!!}'>
        <p class="error-message" x-show.transition.in="username.errorMessage" x-text="username.errorMessage"></p>
      
        <label for="password">Password</label>
        <input name="password" type="password" id="password"
        x-bind:class="{'invalid':password.errorMessage}" data-rules='["required","minimum:8"]' data-server-errors='{!! json_encode($errors->get('password'))!!}'>
        <p class="error-message" x-show.transition.in="password.errorMessage" x-text="password.errorMessage"></p>
        <input class="round-btn" type="submit" value="Log in">
    </form>
    <div class="home-link"><a class=" round-btn"  href="{{route('welcome')}}">Home</a></div>
    @endsection