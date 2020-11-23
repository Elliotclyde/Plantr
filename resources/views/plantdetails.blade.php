@extends('layouts.main')

@section('title'){{ucfirst($plant->type)}} details @endsection


@section('content')

<div class="plant-details">
<div class="plant-details-info">
<h1>{{$plant->quantity}} {{ucfirst($plant->type)}}</h1>

<h2>Ready to harvest:</h2><p>{{$plant->harvestStart}} to {{$plant->harvestEnd}}<br/> (About {{$plant->diffToHarvest}})</p>
<h2>Planted on:</h2><p>{{$plant->planted}}<br/> ({{$plant->daysSincePlant}})</p>
<h2>Planting type:</h2><p>{{$plant->formattedPropogationType}}</p>
@if(isset($plant->transplanted))
<h2>Transplanted on:</h2><p>{{$plant->transplanted}}. {{$plant->daysSinceTransplant}}</p>
@endif
<h2>Tip:</h2>
<p>{{trim(json_decode($plant->details->tips)[rand(0,count(json_decode($plant->details->tips))-1)])}}</p>


</div>
<div class="plant-details-display-container">
    <div class="plant-details-display">
        @svg($plant->svgPath . '1',["class"=>"plant-display-svg-1"])
        @svg($plant->svgPath . '2',["class"=>"plant-display-svg-2"])
        @svg($plant->svgPath . '3',["class"=>"plant-display-svg-3"])
    </div>
</div>

</div>

<div class="plant-details-actions" x-data="{deleteopen:false,transplantopen:false}" >
    <a href="{{route('dashboard')}}"><x-svg-back-home-button class="delete-button"/><span class="action-caption">Dashboard</span></a>
    <a href="#" @click="deleteopen = true"><x-svg-bin class="delete-button"/> <span class="action-caption"> Delete</span></a>
    
    @if( $plant->propogation_type=="proptray" && !isset($plant->transplanted))
    <a href="#" @click="transplantopen = true"><x-svg-transplant-button class="delete-button"/><span class="action-caption"> Transplant</span></a>
   
    <div class="modal-wrapper" x-show="transplantopen">
    <form class="transplant-modal" method="POST" action="{{route('transplant',['plant' => $plant])}}" @click.away="transplantopen=false">
        <h2>Transplant</h2>
        <label for="transplant-date">Transplant date: </label>
        <input id="transplant-date" type="date" name="transplanted" value="{{(new \Carbon\Carbon())->tz('Pacific/Auckland')->format('Y-m-d')}}">
        <input type="submit" value="submit">
        @csrf
    </form>
</div>
    @endif

    <div class="modal-wrapper" x-show="deleteopen">
        <div class="delete-modal" @click.away="deleteopen=false">
            <h2>Delete</h2>
            <label for="delete-button">Are you sure?</label>
            <div class="delete-modal-actions">
            <a href="#" @click="deleteopen = false">Cancel</a>
            <a id="delete-button"  class="delete"  href="{{ route('deleteplant', ['plant' => $plant]) }}"
                onclick="event.preventDefault();
                document.getElementById('delete-form-{{ $plant->id }}').submit();">
               Delete</a>
            </div>
        </div>
    </div>

</div>


<form id="delete-form-{{ $plant->id }}" action="{{ route('deleteplant', ['plant' => $plant]) }}"
     method="POST" style="display: none;">
     @method('DELETE')
    @csrf
</form>


@endsection

