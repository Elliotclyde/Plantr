@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
    <h1 class="hidden-heading">Plantr 2.0 Dashboard</h1>
    
    <div class="plants-container">
        <p>Welcome, {{$name}}</p>
        <h2>Your plants</h2>
    <div class="plants">
        @foreach($plants as $plant)
        <a href="{{route('showplant', ['plant'=>$plant->id])}}">
        <div class="plant-container">
            <div class="plant-container-inner">
        <h3><div>
            <span class="plant-title">{{$plant->quantity}} {{ucfirst($plant->type)}}</span>
            <span class="plant-subtitle">Planted on:<br/> <span class="plant-subtitle-date">{{$plant->planted}}</span></span>
        </div></h3>
        @svg($plant->svgPath . $plant->svgNum)
        <div class="progress-bar">
            <div class="progress" style="width: {{$plant->progress}}%;"><span>{{$plant->progress}}</span></div>
        </div>
        </div>
    </div>
</a>
        @endforeach
    </div>
    <div><a href="{{route('newplant')}}">New plant</a></div>
    </div>
    <a class="log-out-btn" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();"> Logout </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
         {{ csrf_field() }}
 </form>
 @endsection