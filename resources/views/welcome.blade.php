@extends('layouts.main')

@section('title','Home')

@section('content')
    <h1 class="hidden-heading">Plantr 2.0</h1>
    <div class='welcome-hero'>
        <div class="tagline-container">
        <span class="tagline"> Grow<br>Nurture<br>Thrive</span>
        <span class="sub-tagline"> Get into the Garden?</span>
        <a class="call-to-action round-btn" href="{{route('register')}}">Register</a>
            </div>
        <picture>
            <source srcset="{{asset('images/plantr-hero-2-768-768-optim.jpg')}}" media="(max-width: 800px)">
            <img srcset="{{asset('images/plantr-hero-2-1600-1000-optim.jpg')}}" alt="Picture of onions being grown">
          </picture>
        </div>
    <div class="activity-cards">
        <div class="activity-cont"><p class="selling-point">Keep a record of your growing</p><x-svg-record-of-growing/></div>
        <div class="activity-cont"><p class="selling-point">Get notified when plants are ready to harvest</p><x-svg-plants-ready/></div>
        <div class="activity-cont"><p class="selling-point">Get tips on maintaining productivity</p><x-svg-productivity/></div>
    </div>
@endsection