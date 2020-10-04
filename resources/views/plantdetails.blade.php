@extends('layouts.main')

@section('title'){{$plant->type}} details @endsection


@section('content')

<h3>{{$plant->quantity}} {{$plant->type}}</h3>
<p>Planted on: {{$plant->planted}}</p>
<p>Planting type: {{$plant->propogation_type}}</p>

<a href="{{route('dashboard')}}">Back to dashboard</a>
@endsection