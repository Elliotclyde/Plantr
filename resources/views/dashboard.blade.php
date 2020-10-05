@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
    <h1>Plantr 2.0 Dashboard</h1>
    <p>Welcome, {{$name}}</p>
    <div class="plants-container">
        <h2>Your plants</h2>
    <div class="plants">
        @foreach($plants as $plant)
        <div class="plant-container">
        <h3>{{$plant->quantity}} {{ucfirst($plant->type)}}</h3>
        <p>Planted on: {{$plant->planted}}</p>
        <p>Planting type: {{$plant->propogation_type}}</p>
            @if(isset($plant->transplanted))
            <p>Transplanted on: {{$plant->transplanted}}</p>
            @endif
        <a href="{{route('showplant', ['plant'=>$plant->id])}}">Details</a>
        </div>
        @endforeach
    </div>
    <div><a href="{{route('newplant')}}">New plant</a></div>
    </div>




    <a class="log-out-btn" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();"> Logout </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
         {{ csrf_field() }}
 </form>
 @endsection