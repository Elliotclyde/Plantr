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
            <div class="plant-container-inner {{$plant->state=="old"?"old":""}}">
        <h3><div>
            <span class="plant-title">{{$plant->quantity}} {{ucfirst($plant->type)}}</span>
            @if($plant->state=="old")
            <span class="plant-subtitle">{{$plant->formattedState}}</span>
            @elseif($plant->state=="planned")
            <span class="plant-subtitle">Planned to plant on:<br/><span class="plant-subtitle-date">{{$plant->planted}}</span></span>
            @elseif($plant->state=="harveststart"||$plant->state=="harvestend" )
            <span class="plant-subtitle">{{$plant->formattedState}}</span>
            @else
            <span class="plant-subtitle">Ready to harvest:<br/> <span class="plant-subtitle-date">{{$plant->estimatedHarvestDate}}</span></span>
            @endif
        </div></h3>
        @svg($plant->svgPath . $plant->svgNum)
        <div class="progress-bar">
            <div class="progress" style="width: {{$plant->progress}}%;"><span>{{$plant->progress}}</span></div>
        </div>
        </div>
    </div>
</a>
        @endforeach
        <a href="{{route('newplant')}}">
            <div class="plant-container">
                <div class="plant-container-inner">
            <h3 class="new-plant-button-title"><div>
                <span class="plant-title">New plant</span>
                <span class="plant-subtitle"></span></span>
            </div></h3>
            <div class=new-plant-plus>+</div>
            
            <div class="progress-bar new-plant-bar">
                <div class="progress" style="width: 0%;"><span></span></div>
            </div>
            </div>
        </div>
        </a>
    </div>
    <div></div>
    </div>

 @endsection