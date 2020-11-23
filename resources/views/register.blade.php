@extends('layouts.main')

@section('title', 'Register')

@section('content')
<form action="/register" method="POST" x-data="{
    name:{blurred:false,valid:false,value:''},
     username:{blurred:false,valid:false,value:''},
     email:{blurred:false,valid:false,value:''},
     password:{blurred:false,valid:false,value:''},
     passwordConf:{blurred:false,valid:false,value:''},
 }"
 
    x-on:submit.prevent="console.log('hi')">
    @csrf
    <p class="logo-no-header"><span class="logo-text-no-header">Plantr</span>
        <x-svg-plantrlogo />
    </p>
    <label for="name">Name</label>
    <input x-bind:class="{'invalid': name.blurred && (Iodine.is( name.value,['required'])!==true)}"
        x-model=" name.value"  @blur=" name.blurred=true" >
    <label for="username">Username</label>
    <input x-bind:class="{'invalid': username.blurred && (Iodine.is( username.value,['required'])!==true)}"
        x-model=" username.value" @blur=" username.blurred=true" id="username" type="text" name="username"
        placeholder="Username">
    <label for="email">Email</label>
    <input x-bind:class="{'invalid': email.blurred && (Iodine.is( email.value,['required','email'])!==true)}"
        x-model=" email.value" @blur=" email.blurred=true" id="email" type="email" name="email"
        placeholder="Email address">
    <label for="password">Password</label>
    <input x-bind:class="{'invalid': password.blurred && (Iodine.is( password.value,['required','minimum:8'])!==true)}"
        x-model=" password.value" @blur=" password.blurred=true" id="password" type="password" name="password"
        placeholder="Password">
    <label for="password-confirm">Confirm Password</label>
    <input
        x-bind:class="{'invalid': passwordConf.blurred && (Iodine.is( passwordConf.value,['required','minimum:8'])!==true)}"
        x-model=" passwordConf.value" @blur=" passwordConf.blurred=true" id="password-confirm" type="password"
        name="password_confirmation" placeholder="Confirm Password">
    <input class="round-btn" type="submit" value="Register">

    @if($errors->any())
        <div class="form-error" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>

            @foreach($errors->all() as $error)
                {{ $error }}<br />
            @endforeach
        </div>

    @endif

</form>
@endsection