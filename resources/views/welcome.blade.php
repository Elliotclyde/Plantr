@extends('layouts.mainnojs')

@section('title','Home')

@section('content')
    <h1 class="hidden-heading">Plantr 2.0</h1>

    <div class='welcome-hero'>
        <div class="tagline-container">
        <span class="tagline animwrapper"> Grow<br>Nurture<br>Thrive</span>
        <span class="sub-tagline animwrapper"> Get into the Garden?</span>
        <a class="call-to-action round-btn animwrapper" href="{{route('register')}}">Register</a>
        </div>
    </div>
        
    <div class="activity-cards">
        <div class="activity-cont" style="animation-name: fadeIn4;"><p class="selling-point">Keep a record of your growing</p><x-svg-record-of-growing/></div>
        <div class="activity-cont" style="animation-name: fadeIn5;"><p class="selling-point">Get notified when plants are ready to harvest</p><x-svg-plants-ready/></div>
        <div class="activity-cont" style="animation-name: fadeIn6;"><p class="selling-point">Get tips on maintaining productivity</p><x-svg-productivity/></div>
    </div>
@endsection