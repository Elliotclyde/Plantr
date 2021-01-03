@extends('layouts.main')

@section('title'){{ucfirst($plant->type)}} details @endsection


@section('content')

<div class="plant-details">
<div class="plant-details-info">
<h1>{{$plant->quantity}} {{ucfirst($plant->type)}}</h1>
<p>{{$plant->formattedState}}</p>
<h2>Ready to harvest:</h2><p>{{$plant->harvestStart}} to {{$plant->harvestEnd}}<br/> (About {{$plant->diffToHarvest}})</p>
<h2>Planting date:</h2><p>{{$plant->planted}}<br/> ({{$plant->daysSincePlant}})</p>
<h2>Planting type:</h2><p>{{$plant->formattedPropogationType}}</p>
@if(isset($plant->transplanted))
<h2>Transplanting date:</h2><p>{{$plant->transplanted}}. {{$plant->daysSinceTransplant}}</p>
@endif
<h2>Tip:</h2>
<p>{{trim(json_decode($plant->details->tips)[rand(0,count(json_decode($plant->details->tips))-1)])}}</p>


</div>
<div class="plant-details-display-container">
    <div class="plant-details-display" >
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
   
    <div class="modal-wrapper" x-show="transplantopen; $nextTick(()=>document.getElementById('transplant-date').focus());">
    <div @click.away="transplantopen=false">
        
        <form x-data="form()" x-init="init()"  @focusout="change" @input="change" @submit="submit" action="{{route('transplant',['plant' => $plant])}}" method="POST" class="transplant-modal">    
        <h2>Transplant {{ucfirst($plant->type)}}</h2>
        <label for="transplant-date">Transplant date: </label>
        <input class="transplant-date" data-rules='["transplantafterplant","transplantbeforeold"]' id="transplant-date" data-server-errors='[]'
        data-planted="{{$plant->planted}}" data-old="{{$plant->harvestEnd}}" type="date" name="transplanted" 
        value="{{(new \Carbon\Carbon())->tz('Pacific/Auckland')->format('Y-m-d')}}" x-bind:class="{'invalid':transplanted.errorMessage}">
        <p class="error-message" x-show.transition.in="transplanted.errorMessage" x-text="transplanted.errorMessage"></p>
        <input class="round-btn" type="submit" value="Transplant">
        @csrf
    </form>
</div>
</div>
    @endif

    <div class="modal-wrapper" x-show="deleteopen; $nextTick(()=>document.getElementById('close-delete-button').focus());">
        <div class="delete-modal" @click.away="deleteopen=false">
            <h2>Delete</h2>
            <label for="delete-button">Are you sure?</label>
            <div class="delete-modal-actions">
            <a id="close-delete-button" class="round-btn cancel-btn" href="#" @click="deleteopen = false">Cancel</a>
            <a id="delete-button"  class="round-btn delete"  href="{{ route('deleteplant', ['plant' => $plant]) }}"
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

