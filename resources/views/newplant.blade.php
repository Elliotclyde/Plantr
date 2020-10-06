@extends('layouts.main')

@section('title','New plant')

@section('content')

<form action="{{route('newplant')}}" method="post">
    @csrf

    <label for="type">Plant type</label>
    <select name="type" id="type">
        @foreach ($planttypes as $option)
    <option value="{{$option}}">{{$option}}</option>
        @endforeach
    </select>

    <label for="planted">Date planted</label>
    <input type="date" name="planted" id="planted">
    <label for="propogation_type">Type of planting</label>
    <select name="propogation_type" id="propogation_type">
        <option value="directsow">Directly sown into soil</option>
        <option value="seedling">Planting a pre-grown seedling</option>
        <option value="proptray">Growing a seedling in propogation tray to transplant</option>
    </select>

    <label for="quantity">Quantity</label>
    <input type="number" name="quantity" id="quantity" step="1">
    
    <input type="submit">
</form>

@endsection
