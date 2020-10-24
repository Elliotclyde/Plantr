@extends('layouts.main')

@section('title','Home')

@section('content')
    <h1 class="hidden-heading">Plantr 2.0</h1>
    <a href="{{route('login')}}">Login</a>
    <div class='welcome-hero'>
        <div class="tagline">Grow<br>Nurture<br>Thrive</div>
        <div class="sub-tagline">Get into the Garden?</div>
        <img src="{{asset('images/plantr-hero-2-1600-1000-optim.jpg')}}" alt=""></div>
@endsection