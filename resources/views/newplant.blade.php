@extends('layouts.main')

@section('title','New plant')

@section('content')

<form action="{{route('newplant')}}" method="post">
    @csrf

    <label for="type">Plant type</label>
    <select name="type" id="type">
        <option value="beetroot">beetroot</option>
    </select>

    <label for="planted"></label>
    <input type="date" name="planted" id="planted">

    <select name="propogation_type" id="propogation_type">
        <option value="directsow">Directly sown</option>
    </select>

    <label for="quantity">Quantity</label>
    <input type="number" name="quantity" id="quantity" step="1">
    
    <input type="submit">
</form>

@endsection
