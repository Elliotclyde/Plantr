@extends('layouts.main')

@section('content')
<form  action="post">
    <p class="logo-no-header"><span class="logo-text-no-header">Plantr</span><x-svg-plantrlogo/></p>
    <label for="">Email</label>
    <input type="email" placeholder="Email address">
    <label for="">Password</label>
    <input type="password" placeholder="Password">
    <label for="">Confirm Password</label>
    <input type="password" placeholder="Confirm Password">
    <label for="">Name</label>
    <input type="text" placeholder="Name">
    <input class="round-btn" type="submit" value="Register">
</form>
@endsection