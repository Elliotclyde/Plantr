@extends('layouts.main')

@section('title'){{ucfirst($plant->type)}} details @endsection


@section('content')

<h1>{{$plant->quantity}} {{ucfirst($plant->type)}}</h3>
<p>Planted on: {{$plant->planted}}. {{$plant->daysSincePlant}}.</p>
<p>Planting type: {{$plant->propogation_type}}</p>
<p>Ready to harvest sometime between {{$plant->harvestStart}} and {{$plant->harvestEnd}}. About {{$plant->diffToHarvest}}.</p>
@if(isset($plant->transplanted))
<p>Transplanted on: {{$plant->transplanted}}. {{$plant->daysSinceTransplant}}.</p>
@endif

@if( $plant->propogation_type=="proptray" && !isset($plant->transplanted) )
<form method="POST" action="{{route('transplant',['plant' => $plant])}}">
    <h2>Transplant</h2>
    <label for="transplant-date">Transplant date: </label>
    <input id="transplant-date" type="date" name="transplanted">
    <input type="submit" value="submit">
    @csrf
</form>
@endif

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