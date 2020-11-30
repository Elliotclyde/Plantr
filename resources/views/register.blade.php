@extends('layouts.main')

@section('title', 'Register')

@section('content')


<form action="/register" method="POST" x-data="{}" 
    x-on:submit="if([...$el.querySelectorAll('input:not([type=hidden]):not([type=submit])')].filter(el=>!el.dataset.isvalid).length==0){
        console.log($el.querySelectorAll('input:not([type=hidden]):not([type=submit])'));
        $el.submit;
    }else{return false;}">
    <script>
        Iodine.addRule('matchingPassword', (value) =>value === document.getElementById('password').value);
        function input() {
        return {
            blurred:false,
            val:'',
            serverErrors:[],
            rules:[],
            isValid:false,
            showInvalid:false,
            check:function(){
                this.isValid=(Iodine.is(this.val,this.rules));
                if(this.serverErrors.length>0){this.showInvalid='serverErrors'}
                else if(this.isValid!==true && this.blurred){this.showInvalid = 'clientErrors'}
                else(this.showInvalid = false)
            },
            init(el,initVal){
                this.serverErrors=JSON.parse(el.dataset.serverErrors);
                this.rules=JSON.parse(el.dataset.rules);
                this.val=initVal;
                this.check();
            },
            input: {
                ['@input'](){
                    this.serverErrors=[];
                    this.check();
                },
                ['@blur'](){
                    this.blurred=true;
                    this.check();
                },
                ['x-bind:class'](){
                    return {'invalid':this.showInvalid}
                }
            }
        }
    }
    </script>
    @csrf
    <p class="logo-no-header"><span class="logo-text-no-header">Plantr</span>
        <x-svg-plantrlogo />
    </p>
    <label for="name">Name</label>
    <div x-data="input()" data-rules='["required"]' data-server-errors='{!! json_encode($errors->get('name')) !!}'
        x-init="init($el,'{{old('name')}}')" >
        <input name="name" x-spread="input" placeholder="Name" id="name" type="text" x-model="val" x-bind:data-isvalid="isValid===true" >
        <p x-show="showInvalid==='clientErrors'" class="formerror">Name is required</p>
        <p x-show="showInvalid==='serverErrors'" class="formerror" x-text="serverErrors[0]"></p>
    </div>

    <div x-data="input()" data-rules='["required"]' data-server-errors='{!! json_encode($errors->get('username')) !!}'
        x-init="init($el,'{{old('username')}}')">
        <label for="username">Username</label>
        <input x-spread="input" id="username" type="text" name="username" placeholder="Username" x-model="val" x-bind:data-isvalid="isValid===true" >
        <p x-show="showInvalid==='clientErrors'" class="formerror">Username is required</p>
        <p x-show="showInvalid==='serverErrors'" class="formerror" x-text="serverErrors[0]"></p>
    </div>

    <div x-data="input()" data-rules='["required","email"]' data-server-errors='{!! json_encode($errors->get('email')) !!}'
        x-init="init($el,'{{old('email')}}')">
    <label for="email">Email</label>
        <input id="email" type="email" name="email" x-spread="input" placeholder="Email address" x-model="val" x-bind:data-isvalid="isValid===true" >
        <p x-show="showInvalid==='clientErrors'" class="formerror">Email is required</p>
        <p x-show="showInvalid==='serverErrors'" class="formerror" x-text="serverErrors[0]"></p>
    </div>

    <label for="password">Password</label>
    <div x-data="input()" data-rules='["required","minimum:8"]' data-server-errors='{!! json_encode($errors->get('password')) !!}'
        x-init="init($el,'{{old('password')}}')">
        <input x-spread="input" id="password" type="password" name="password" placeholder="Password" x-model="val" x-bind:data-isvalid="isValid===true" >
        <p x-show="showInvalid==='clientErrors'" class="formerror">Please enter password of at least 8 characters</p>
        <p x-show="showInvalid==='serverErrors'" class="formerror" x-text="serverErrors[0]"></p>
    </div>

    <label for="password-confirm">Confirm Password</label>
    <div x-data="input()" data-rules='["required","minimum:8","matchingPassword"]' data-server-errors='{!! json_encode($errors->get('password_confirmation')) !!}'
        x-init="init($el,'{{old('password_confirmation')}}')">
        <input x-spread="input"  id="password-confirm" type="password" name="password_confirmation" placeholder="Confirm Password"  x-model="val"
        x-bind:data-isvalid="isValid===true" >
        <p x-show="showInvalid==='clientErrors'" class="formerror">Please confirm matching password</p>
        <p x-show="showInvalid==='serverErrors'" class="formerror" x-text="serverErrors[0]"></p>
    </div>

    <input class="round-btn" type="submit" value="Register">
    
</form>

@endsection
