@extends('layouts.main')

@section('title','New plant')

@section('content')
<h1>New Plant</h1>
<form action="{{route('newplant')}}" method="post">
    <div class="plant-type-container">
    <!-- Input (on left side on wider screens) -->
        <div class="plant-type-input-container">
            <label for="type">Choose Plant</label>
            <select class=plant-type-select name="type" id="type">
                @foreach ($planttypes as $option)
                <option value="{{$option}}">{{$option}}</option>
                @endforeach
            </select>
        </div>
    <!-- Display of plant with tips -->
        <div class="plant-display-container">
            <h2 class="plant-display-title"></h2>
            <!-- SVG-ofplants -->
            <div></div>
            <p class="growing-tip"></p>
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
