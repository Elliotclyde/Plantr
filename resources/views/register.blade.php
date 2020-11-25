@extends('layouts.main')

@section('title', 'Register')

@section('content')

<form action="/register" method="POST" x-data="getData()" id="register-form"
x-on:submit.prevent="if(Object.keys(data).filter(key=>data[key].isValid!==true).length===0){
    $el.submit()
    }else{console.log('not sunbmited')}">
    @csrf
    <p class="logo-no-header"><span class="logo-text-no-header">Plantr</span>
        <x-svg-plantrlogo />
    </p>
    <p class="formerror" x-bind:class="{'visible':(serverSideFormErrors.length>0)}"  x-text="serverSideFormErrors"></p>

    <label for="name">Name</label>
    <input x-bind:class="{'invalid':showAsInvalid(data,'name')}" 
        @input="inputChange({data:data,serverErrors:serverSideFormErrors,event:$event})" 
        name="name"  placeholder="Name" data-rules="['required']"
        id="name" type="text" @blur="data.name.blurred=true" value="{{old('name')}}">  
        <p class="formerror" x-bind:class="{'visible':showAsInvalid(data,'name')}">Name is required</p>

        <label for="username">Username</label>
        <input x-bind:class="{'invalid':showAsInvalid(data,'username')}" data-rules="['required']"
        @input="inputChange({data:data,serverErrors:serverSideFormErrors,event:$event})" 
            id="username" type="text" name="username" placeholder="Username" @blur="data.username.blurred=true" value="{{old('username')}}">
        <p class="formerror"  x-bind:class="{'visible':showAsInvalid(data,'username')}">Username is required</p>

        <label for="email">Email</label>
        <input x-bind:class="{'invalid': showAsInvalid(data,'email')}" data-rules="['required','email']"
        @input="inputChange({data:data,serverErrors:serverSideFormErrors,event:$event})" 
        " @blur="data.email.blurred=true" id="email" type="email" name="email"
        placeholder="Email address" value="{{old('email')}}">
        <p class="formerror" x-bind:class="{'visible':showAsInvalid(data,'email')}">Please enter valid email address</p>

        <label for="password">Password</label>
        <input x-bind:class="{'invalid': showAsInvalid(data,'password')}" data-rules="['required','minimum:8']"
        @input="inputChange({data:data,serverErrors:serverSideFormErrors,event:$event})" 
         @blur="data.password.blurred=true" id="password" type="password" name="password"
        placeholder="Password">
        <p class="formerror" x-bind:class="{'visible':showAsInvalid(data,'password')}">Please enter password of at least 8 characters</p>

        <label for="password-confirm">Confirm Password</label>
        <input x-bind:class="{'invalid':showAsInvalid(data,'password_confirmation')}" data-rules="['required','minimum:8']"
        @input="inputChange({data:data,serverErrors:serverSideFormErrors,event:$event})" 
        @blur="data.password_confirmation.blurred=true" id="password-confirm" type="password"
        name="password_confirmation" placeholder="Confirm Password" >
        <p class="formerror" x-bind:class="{'visible':showAsInvalid(data,'password_confirmation')}">Please confirm password</p> 

    <input class="round-btn" type="submit" value="Register">
    <script defer>
        function inputChange({data,event,serverErrors}){
            data[event.target.name].isValid= Iodine.is(event.target.value,eval(event.target.dataset.rules));
            data[event.target.name].showAsInvalid = (data[event.target.name].blurred) && (data[event.target.name].isValid!==true);
            serverErrors.length=0;
        }
        function showAsInvalid(data,name){
           return (data[name].blurred && data[name].isValid!==true);
         }
        
        function getInitFormValues(){
            let initFormValues= {};
            [...document.querySelectorAll('[type=text],[type=email],[type=password]')].map(
                (e)=>{initFormValues[e.name]={blurred: false,isValid: Iodine.is(e.value,eval(e.dataset.rules)),showAsInvalid:false}});
            return initFormValues;
        };

        function getData() {
            return {
                data:getInitFormValues(),
                serverSideFormErrors:[@if($errors->any()) @foreach($errors->all() as $error)"{{$error}}" @endforeach @endif]
            }
        }
    </script>
    
</form>
@endsection