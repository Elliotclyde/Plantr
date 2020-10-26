@extends('layouts.main')

@section('title','Home')

@section('content')
    <h1 class="hidden-heading">Plantr 2.0</h1>
    <div class='welcome-hero'>
        <div class="tagline-container">
        <span class="tagline"> Grow<br>Nurture<br>Thrive</span>
        <span class="sub-tagline"> Get into the Garden?</span>
        <a class="call-to-action" href="{{route('register')}}">Register</a>
            </div>
        <picture>
            <source srcset="{{asset('images/plantr-hero-2-768-768-optim.jpg')}}" media="(max-width: 800px)">
            <img srcset="{{asset('images/plantr-hero-2-1600-1000-optim.jpg')}}" alt="Picture of onions being grown">
          </picture>
@endsection