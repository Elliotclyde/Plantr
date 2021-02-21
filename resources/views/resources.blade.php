@extends('layouts.main')
@section('title','Resources')
@section('content')
<div class="content-section">
    
    <h1>Resources @if(Auth::check())
        <a class="content-dashboard-link" href="{{route('dashboard')}}"><x-svg-back-home-button class="delete-button"/><span class="content-dashboard-link-caption">Dashboard</span></a>
    
    @endif</h1>
    
    <p>A helpful list of gardening resources:</p>
    <ul>
        <li><a target="_blank" href="https://tuigarden.co.nz/">https://tuigarden.co.nz/</a></li>
        <li><a target="_blank" href="https://tendingmygarden.com/">https://tendingmygarden.com/</a></li>
        <li><a target="_blank" href="http://www.herbexpert.co.uk/">http://www.herbexpert.co.uk/</a></li>
        <li><a target="_blank" href="https://www.gardenguides.com/">https://www.gardenguides.com/</a></li>
        <li><a target="_blank" href="https://www.palmers.co.nz/secrets-garden-success/">https://www.palmers.co.nz/secrets-garden-success/</a></li>
        <li><a target="_blank" href="https://www.gogardening.co.nz/">https://www.gogardening.co.nz/</a></li>
    </ul>
</div>

@endsection