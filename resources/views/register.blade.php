@extends('layouts.main')

@section('title', 'Register')

@section('content')


<form  action="/register" method="POST" x-data="form()" x-init="init()" @focusout="change" @input="change" @submit="submit">
    <p class="logo-no-header"><span class="logo-text-no-header">Plantr</span><x-svg-plantrlogo/></p>
@csrf
    <label for="name">Name</label>
<input name="name" id="name" type="text" value="{{old('name')}}"
     x-bind:class="{'invalid':name.errorMessage}" data-rules='["required","lettersSpacesDashes"]' data-server-errors='{!! json_encode($errors->get('name'))!!}'>
    <p class="error-message" x-show.transition.in="name.errorMessage" x-text="name.errorMessage"></p>
  
    <label for="username">Username</label>
    <input name="username" id="username" type="text" value="{{old('username')}}"
     x-bind:class="{'invalid':username.errorMessage}" data-rules='["required"]' data-server-errors='{!! json_encode($errors->get('username'))!!}'>
    <p class="error-message" x-show.transition.in="username.errorMessage" x-text="username.errorMessage"></p>
  
    <label for="email">Email</label>
    <input name="email" type="email" id="email" value="{{old('email')}}"
    x-bind:class="{'invalid':email.errorMessage}" data-rules='["required","email"]' data-server-errors='{!! json_encode($errors->get('email'))!!}'>
    <p class="error-message" x-show.transition.in="email.errorMessage" x-text="email.errorMessage"></p>
  
    <label for="password">Password</label>
    <input name="password" type="password" id="password"
    x-bind:class="{'invalid':password.errorMessage}" data-rules='["required","minimum:8"]' data-server-errors='{!! json_encode($errors->get('password'))!!}'>
    <p class="error-message" x-show.transition.in="password.errorMessage" x-text="password.errorMessage"></p>
  
    <label for="password_confirmation">Confirm Password</label>
    <input name="password_confirmation" type="password" id="password_confirmation"
     x-bind:class="{'invalid':password_confirmation.errorMessage}" data-rules='["required","minimum:8","matchingPassword"]' 
     data-server-errors='{!! json_encode($errors->get('password_confirmation'))!!}'>
    <p class="error-message" x-show.transition.in="password_confirmation.errorMessage" x-text="password_confirmation.errorMessage"></p>
  
    <input type="submit">
  </form>

@endsection
