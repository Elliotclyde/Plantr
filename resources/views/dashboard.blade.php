@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
    <h1>Plantr 2.0 Dashboard</h1>
    <p>Welcome, {{$name}}</p>
    <div class="plants-container">
    <div class="plants">
        @foreach($plants as $plant)
        <p>I'm a plant</p>
        @endforeach
    </div>
    <div><a href="{{route('newplant')}}">New plant</a></div>
    </div>




    <a class="log-out-btn" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();"> Logout </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
         {{ csrf_field() }}
 </form>
 @endsection