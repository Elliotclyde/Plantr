    @extends('layouts.noheader')

    @section('title', 'Login')

    @section('content')
    <h1 class="hidden-heading">Plantr 2.0 Login</h1>
    <form action="/login" method="post" x-data="getData('login-form')" id="login-form"
    x-on:submit.prevent="if(Object.keys(formState).filter(key=>formState[key].isValid!==true).length===0){$el.submit()}"
    data-server-errors="[@if($errors->any())
        @foreach($errors->all() as $index=>$error) 
            @if($index!=0){{',\''. addslashes($error).'\''}}  
            @else {{'\''.addslashes($error).'\''}} 
            @endif 
        @endforeach 
    @endif]"
    >
    <p class="logo-no-header"><span class="logo-text-no-header">Plantr</span><x-svg-plantrlogo/></p>
    @csrf

    <label for="username">Username</label>
    <input type="username" name="username" id="username" placeholder="Username"
     data-rules="['required']" 
    @input="mutateFormState(formState)"
    @blur="blur(formState,'username');mutateFormState(formState);"
    x-bind:class="{'invalid':(showsInvalid(formState,'username'))}" >
    <p x-show="showsInvalid(formState,'username')" class="formerror" >Username is required</p>

    <label for="password">Password</label>
    <input type="password" name="password" id="password" placeholder="Password"
    data-rules="['required']" 
    @input="mutateFormState(formState)"
    @blur="blur(formState,'password');mutateFormState(formState);"
    x-bind:class="{'invalid':(showsInvalid(formState,'password'))}">
    <p x-show="showsInvalid(formState,'password')" class="formerror" >Password is required</p>

    <input class="round-btn" type="submit" value="Log in">
    <template x-for="(error, index) in serverSideFormErrors" :key="index">
        <p class="server-form-error" x-text="error"></p>
    </template>
    </form>
    <div class="home-link"><a class=" round-btn"  href="{{route('welcome')}}">Home</a></div>
    @endsection