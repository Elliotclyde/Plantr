@extends('layouts.main')

@section('title'){{$plant->type}} details @endsection


@section('content')

<h3>{{$plant->quantity}} {{$plant->type}}</h3>
<p>Planted on: {{$plant->planted}}</p>
<p>Planting type: {{$plant->propogation_type}}</p>
<a   href="{{ route('deleteplant', ['plant' => $plant]) }}"
    onclick="event.preventDefault();
    document.getElementById('delete-form-{{ $plant->id }}').submit();">
    Delete
</a>
<form id="delete-form-{{ $plant->id }}" action="{{ route('deleteplant', ['plant' => $plant]) }}"
     method="POST" style="display: none;">
     @method('DELETE')
    @csrf
</form>

<a href="{{route('dashboard')}}">Back to dashboard</a>
@endsection