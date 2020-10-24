@extends('layouts.main')

@section('content')
<form action="post">
    <label for="">Email</label>
    <input type="email">
    <label for="">Password</label>
    <input type="password">
    <label for="">Confirm Password</label>
    <input type="passwordconfirm">
    <label for="">Name</label>
    <input type="text">
</form>
@endsection