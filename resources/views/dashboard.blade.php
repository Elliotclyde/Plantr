@extends('layouts.main')

@section('title', 'Dashboard')

    <h1>Plantr 2.0 Dashboard</h1>
    <p>Welcome, {{$name}}</p>


    <a class="log-out-btn" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();"> Logout </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
         {{ csrf_field() }}
 </form>
