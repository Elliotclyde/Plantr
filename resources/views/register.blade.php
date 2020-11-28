@extends('layouts.main')

@section('title', 'Register')

@section('content')


<form action="/register" method="POST" x-data="getData()" id="register-form"
data-server-errors="[@if($errors->any())
        @foreach($errors->all() as $index=>$error) 
            @if($index!=0){{',\''. $error.'\''}}  
            @else {{'\''.$error.'\''}} 
            @endif 
        @endforeach 
    @endif]">
    @csrf
    <p class="logo-no-header"><span class="logo-text-no-header">Plantr</span>
        <x-svg-plantrlogo />
    </p>
    <template x-for="(error, index) in serverSideFormErrors" :key="index">
            <p class="formerror" x-text="error"></p>
    </template>

    <label for="name">Name</label>
    <input name="name"  placeholder="Name" data-rules="['required']" 
        @input="mutateFormState(formState)"
        @blur="blur(formState,'name');mutateFormState(formState);"
        x-bind:class="{'invalid':(showsInvalid(formState,'name'))}" 
        id="name" type="text" value="{{old('name')}}">  
        <p x-show="showsInvalid(formState,'name')" class="formerror" >Name is required</p>

        <label for="username">Username</label>
        <input data-rules="['required']"
        @input="mutateFormState(formState)"
        @blur="blur(formState,'username');mutateFormState(formState)"
        x-bind:class="{'invalid':(showsInvalid(formState,'username'))}" 
            id="username" type="text" name="username" placeholder="Username" value="{{old('username')}}">
        <p x-show="showsInvalid(formState,'username')" class="formerror">Username is required</p>

        <label for="email">Email</label>
        <input data-rules="['required','email']"id="email" type="email" name="email"
        @input="mutateFormState(formState)"
        @blur="blur(formState,'email');mutateFormState(formState)"
        x-bind:class="{'invalid':(showsInvalid(formState,'email'))}" 
        placeholder="Email address" value="{{old('email')}}">
        <p x-show="showsInvalid(formState,'email')" class="formerror">Please enter valid email address</p>

        <label for="password">Password</label>
        <input data-rules="['required','minimum:8']"
        @input="mutateFormState(formState)"
        @blur="blur(formState,'password');mutateFormState(formState)"
        x-bind:class="{'invalid':(showsInvalid(formState,'password'))}" 
       id="password" type="password" name="password"
        placeholder="Password">
        <p x-show="showsInvalid(formState,'password')" class="formerror">Please enter password of at least 8 characters</p>

        <label for="password-confirm">Confirm Password</label>
        <input data-rules="['required','minimum:8','matchingPassword']"
        @input="mutateFormState(formState)"
        @blur="blur(formState,'password_confirmation');mutateFormState(formState)"
        x-bind:class="{'invalid':(showsInvalid(formState,'password_confirmation'))}" 
         id="password-confirm" type="password"
        name="password_confirmation" placeholder="Confirm Password" >
        <p x-show="showsInvalid(formState,'password_confirmation')" class="formerror">Please confirm matching password</p> 

    <input class="round-btn" type="submit" value="Register">
    
</form>

@endsection