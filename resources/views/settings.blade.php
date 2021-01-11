@extends('layouts.main')

@section('title', 'Settings')

@section('content')



<div x-data="{showing:'{!! session('settingsOpen') !!}', logoutopen:false , justUpdated:'{!!session('justUpdated') !!}'}">

<div class="settings-actions">
    <a class="animwrapper action1" @click="showing!=='profilesettings'?showing='profilesettings':showing=''" x-bind:class="{'current':showing=='profilesettings'}" href="#"><x-svg-profile-button class="delete-button"/><span class="settings-caption">Profile Settings</span></a>
    <a class="animwrapper action2" @click="showing!=='plantsettings'?showing='plantsettings':showing=''" x-bind:class="{'current':showing=='plantsettings'}" href="#">@svg('single-plants.cauli.cauli-2',["class"=>"delete-button"])<span class="settings-caption">Planting Settings</span></a>
    <a class="animwrapper action3" href="{{route('dashboard')}}"><x-svg-back-home-button class="delete-button"/><span class="settings-caption">Dashboard</span></a>
</div>



<div class="profile-cont" x-show.transition="showing=='profilesettings'">
    <h2>Profile Settings</h2>
        <h3>Not {{$user->username}}?</h3>
        <button class="round-btn logout-btn"  href="#" @click="logoutopen = true">Logout</button>
        <div class="modal-wrapper" style="display: none;" x-show="logoutopen">
            <div class="delete-modal" style="display: none;" x-show.transition="logoutopen;$nextTick(()=>document.getElementById('logout-button').focus());" @click.away="logoutopen=false">
                <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;" method="POST" @click.away="logoutopen=false"> @csrf</form>     
                <h2>Logout</h2>
                <p>Are you sure?</p>
                <div class="delete-modal-actions">
                <button id="logout-button" class="round-btn" @click="document.getElementById('logoutform').submit()" type="submit" value="logout">Logout</button>
                <button class="round-btn cancel-btn" @click="logoutopen = false">Cancel</button>
                </div>
            </div>
    </div>
    <h3>Change details</h3>
    <form id="change-details" class="settingsform"  action="/profile-change" method="POST" x-data="form()" x-init="init()" @focusout="change" @input="change" @submit="submit">
    @csrf

    <label for="oldpassword">Current Password *</label>
    <input name="oldpassword" type="password" id="oldpassword"
    x-bind:class="{'invalid':oldpassword.errorMessage}" data-rules='["required","minimum:8"]' data-server-errors='{!! json_encode($errors->get('oldpassword'))!!}'>
    <p class="error-message" x-show.transition.in="oldpassword.errorMessage" x-text="oldpassword.errorMessage"></p>

        <label for="name">Name</label>
        <input name="name" id="name" type="text"  value="{{old('name', $user->name)}}"
         x-bind:class="{'invalid':name.errorMessage}" data-rules='["lettersSpacesDashes"]' data-server-errors='{!! json_encode($errors->get('name'))!!}'>
        <p class="error-message" x-show.transition.in="name.errorMessage" x-text="name.errorMessage"></p>

        <label for="email">Email</label>
        <input name="email" type="email" id="email" value="{{old('email', $user->email)}}"
        x-bind:class="{'invalid':email.errorMessage}" data-rules='["email"]' data-server-errors='{!! json_encode($errors->get('email'))!!}'>
        <p class="error-message" x-show.transition.in="email.errorMessage" x-text="email.errorMessage"></p>
      
        <label for="newpassword">New Password</label>
        <input name="newpassword" type="password" id="newpassword" 
        x-bind:class="{'invalid':newpassword.errorMessage}"  data-rules='[]'
         data-server-errors='{!! json_encode($errors->get('newpassword'))!!}'>
        <p class="error-message" x-show.transition.in="newpassword.errorMessage" x-text="newpassword.errorMessage"></p>
      
        <label for="newpassword_confirmation">Confirm Password</label>
        <input name="newpassword_confirmation" type="password" id="newpassword_confirmation"  data-rules='[]' 
        data-server-errors='{!! json_encode($errors->get('newpassword_confirmation'))!!}' x-bind:class="{'invalid':newpassword_confirmation.errorMessage}" >
        <p class="error-message"  x-show.transition.in="newpassword_confirmation.errorMessage" x-text="newpassword_confirmation.errorMessage"></p>
      
        <input type="submit">
      </form>
</div>
<div class="profile-cont" x-show.transition="showing=='plantsettings'">
    <h2>Planting Settings</h2>
    <form class="settingsform" x-data="{wateringtoggled:{{$user->rain_toggle ?'true':'false'}}}" action="/planting-change" method="POST">
        @csrf
    <h3>Set Climate</h3>
    <fieldset class="prop-type-input-container">
        <input class="prop-type-radio" type="radio" id="subtropical" name="climate" value="subtropical" {{$user->climate=="subtropical" ?'checked':''}}/>
        <label for="subtropical" class="prop-type-label" aria-label="subtropical">
            @svg('climates.subtropical')
                <p class="climate-label">Sub tropical</p>

        </label>
        <input class="prop-type-radio" type="radio" id="temperate" name="climate" value="temperate" {{$user->climate=="temperate" ?'checked':''}}/>
        <label for="temperate" class="prop-type-label" aria-label="temperate">
            @svg('climates.temperate')
                <p class="climate-label">Temperate</p>

        </label>
        <input class="prop-type-radio" type="radio" id="cool" name="climate" value="cool" {{$user->climate=="cool" ?'checked':''}}>
        <label for="cool" class="prop-type-label" aria-label="cool">
            @svg('climates.cool')
                <p class="climate-label">Cool</p>

        </label>
    </fieldset>
    <label for="rain-toggle"><h3>Watering Reminders</h3></label>
    <input class="rain-toggle" x-model="wateringtoggled" id="rain-toggle" name="rain_toggle" type="checkbox" />
    <label class="rain-frequency-label" for="rain-frequency" ><h3>Watering Frequency</h3></label>
    <div> Every <input x-bind:disabled="!wateringtoggled" value="{{old('rain_frequency', $user->rain_frequency)}}" max="10" class="rain-frequency" id="rain-frequency" name="rain_frequency" type="number" step="1"> days</div>
    <input type="submit">
    </form>
    
</div>
<div class="modal-wrapper" style="display: none;"  x-show="justUpdated; $nextTick(()=>document.getElementById('close-modal-button').focus());">
    <div class="delete-modal" style="display: none;" x-show.transition="justUpdated" @click.away="justUpdated=false">
       <h3>Details successfully updated</h3>
        <button  id="close-modal-button" class="round-btn cancel-btn" @click="justUpdated = false" wire>Okay</button>
    </div>
</div>
</div>
@endsection
