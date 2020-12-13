@extends('layouts.main')

@section('title', 'Settings')

@section('content')

<div class="profile-cont">
    <h2>Profile - {{$user->name}}</h2>
    <div x-data="{logoutopen:false}" >
        Not {{$user->name}}?<button class="logout-open"  href="#" @click="logoutopen = true">Logout</button>
        
        <div class="modal-wrapper" style="display: none;" x-show="logoutopen">
            <div class="transplant-modal" style="display: none;" x-show="logoutopen" @click.away="logoutopen=false">
                <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;" method="POST" @click.away="logoutopen=false"> @csrf</form>     
                <h2>Logout</h2>
                <p>Are you sure?</p>
                <button class="round-btn" @click="document.getElementById('logoutform').submit()" type="submit" value="logout">Logout</button>
                <button class="round-btn cancel-btn" @click="logoutopen = false">Cancel</button>
            </div>
        </div>
    </div>
<h3>Change details?</h3>
    <form class="settingsform"  action="/settings-change" method="POST" x-data="form()" x-init="init()" @focusout="change" @input="change" @submit="submit">
    @csrf
        <label for="name">Name</label>
        <input name="name" id="name" type="text"  value="{{$user->name}}"
         x-bind:class="{'invalid':name.errorMessage}" data-rules='["required","lettersSpacesDashes"]' data-server-errors='{!! json_encode($errors->get('name'))!!}'>
        <p class="error-message" x-show.transition.in="name.errorMessage" x-text="name.errorMessage"></p>
      
        <label for="username">Username</label>
        <input name="username" id="username" type="text" value="{{$user->username}}"
         x-bind:class="{'invalid':username.errorMessage}" data-rules='["required"]' data-server-errors='{!! json_encode($errors->get('username'))!!}'>
        <p class="error-message" x-show.transition.in="username.errorMessage" x-text="username.errorMessage"></p>
      
        <label for="email">Email</label>
        <input name="email" type="email" id="email" value="{{$user->email}}"
        x-bind:class="{'invalid':email.errorMessage}" data-rules='["required","email"]' data-server-errors='{!! json_encode($errors->get('email'))!!}'>
        <p class="error-message" x-show.transition.in="email.errorMessage" x-text="email.errorMessage"></p>

        <label for="oldpassword">Old Password</label>
        <input name="oldpassword" type="password" id="oldpassword"
        x-bind:class="{'invalid':oldpassword.errorMessage}" data-rules='["required","minimum:8"]' data-server-errors='{!! json_encode($errors->get('oldpassword'))!!}'>
        <p class="error-message" x-show.transition.in="oldpassword.errorMessage" x-text="oldpassword.errorMessage"></p>
      
        <label for="newpassword">New Password</label>
        <input name="newpassword" type="password" id="newpassword" 
         data-server-errors='{!! json_encode($errors->get('newpassword'))!!}'>
        <p class="error-message"></p>
      
        <label for="new_password_confirmation">Confirm Password</label>
        <input name="new_password_confirmation" type="password" id="new_password_confirmation">
        <p class="error-message"></p>
      
        <input type="submit">
      </form>


</div>
<div class="plant-details-actions"  >
<a href="{{route('dashboard')}}"><x-svg-back-home-button class="delete-button"/><span class="action-caption">Dashboard</span></a>
</div>
@endsection
