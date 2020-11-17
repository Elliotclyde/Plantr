@extends('layouts.main')

@section('title'){{ucfirst($plant->type)}} details @endsection


@section('content')

<div class="plant-details">
<div class="plant-details-info">
<h1>{{$plant->quantity}} {{ucfirst($plant->type)}}</h1>

<h2>Ready to harvest:</h2><p>Between {{$plant->harvestStart}} and {{$plant->harvestEnd}} (About {{$plant->diffToHarvest}})</p>
<h2>Planted on:</h2><p>{{$plant->planted}}. ({{$plant->daysSincePlant}})</p>
<h2>Planting type:</h2><p>{{$plant->propogation_type}}</p>
@if(isset($plant->transplanted))
<h2>Transplanted on:</h2><p>  {{$plant->transplanted}}. {{$plant->daysSinceTransplant}}</p>
@endif
<h2>Tip:</h2>
<p>{{trim(json_decode($plant->details->tips)[rand(0,count(json_decode($plant->details->tips))-1)])}}</p>
@if( $plant->propogation_type=="proptray" && !isset($plant->transplanted) )
<form method="POST" action="{{route('transplant',['plant' => $plant])}}">
    <h2>Transplant</h2>
    <label for="transplant-date">Transplant date: </label>
    <input id="transplant-date" type="date" name="transplanted">
    <input type="submit" value="submit">
    @csrf
</form>
@endif
</div>
<div class="plant-details-display-container">
    <div class="plant-details-display">
        @svg($plant->svgPath . '1',["class"=>"plant-display-svg-1"])
        @svg($plant->svgPath . '2',["class"=>"plant-display-svg-2"])
        @svg($plant->svgPath . '3',["class"=>"plant-display-svg-3"])
    </div>
</div>

</div>
<div class="plant-details-actions">
    

    <a href="{{route('dashboard')}}"><x-svg-back-home-button class="delete-button"/><span class="action-caption"> Back to dashboard</span></a>
<a   href="{{ route('deleteplant', ['plant' => $plant]) }}"
    onclick="event.preventDefault();
    document.getElementById('delete-form-{{ $plant->id }}').submit();">

    <x-svg-bin class="delete-button"/> <span class="action-caption"> Delete</span>
</a>

<form id="delete-form-{{ $plant->id }}" action="{{ route('deleteplant', ['plant' => $plant]) }}"
     method="POST" style="display: none;">
     @method('DELETE')
    @csrf
</form>

</div>

@endsection

