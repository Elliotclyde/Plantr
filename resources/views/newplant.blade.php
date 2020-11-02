@extends('layouts.main')





@section('title','New plant')

@section('content')
<svg style="display: none;">
@foreach ($planttypes as $plant)
<symbol id="{{$plant->type . "-icon"}}"> 
@svg($plant->svg_path . 3)
</symbol>
@endforeach
</svg>
<h1>New Plant</h1>

<form class="new-plant-form" action="{{route('newplant')}}" method="post">
    @csrf
    <div class="plant-type-container">
        <p class="label">Choose Plant</p>
        <div class="plant-type-display-container">
    <!-- Input (on left side on wider screens) -->
        <div class="plant-type-input-container">
            
                @foreach ($planttypes as $option)
                <input class="plant-type-radio" id="{{$option->type . "-radio"}}" type="radio" name="type" value="{{$option->type}}">
                <label for="{{$option->type . "-radio"}}" class="plant-type-label" aria-label={{$option->type}}>
                    <svg><use href="{{'#' . $option->type . "-icon"}}"></svg>
                </label>
                @endforeach
        </div>
    <!-- Display of plant with tips -->
        <div class="plant-display-container">
            <h2 class="plant-display-title"></h2>
            <!-- SVG-ofplants -->
            <div>
                <svg><use xlink:href="#beetroot-icon"></svg>
            </div>
            <p class="growing-tip"></p>
        </div>
        </div>
    </div>

    <label for="planted">Select date of planting</label>
    <input type="date" name="planted" id="planted">
    <label for="quantity">Select how many plants</label>
    <input type="number" name="quantity" id="quantity" step="1">

    <label for="propogation_type">Type of planting</label>
    <select name="propogation_type" id="propogation_type">
        <option value="directsow">Directly sown into soil</option>
        <option value="seedling">Planting a pre-grown seedling</option>
        <option value="proptray">Growing a seedling in propogation tray to transplant</option>
    </select>

    
    <input type="submit">

</form>

@endsection
