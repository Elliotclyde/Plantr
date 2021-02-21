@extends('layouts.main')

@section('title','About')

@section('content')

<div class="content-section">
    <h1>About Plantr @if(Auth::check())
        <a class="content-dashboard-link" href="{{route('dashboard')}}"><x-svg-back-home-button class="delete-button"/><span class="content-dashboard-link-caption">Dashboard</span></a>
    
    @endif</h1>
    <h2>The problem</h2>
    <p>When I garden I find it difficult to remember important information. </p>  
    <p>When did I plant that spinach? Did I water those cauliflower yesterday or the day before? 
       How long ago did I plant those carrots?</p>
       <h2>The right information.</br> Right when you need it.</h2>   
    <p>Plantr is a web application built to help you grow your vegetables. It's like a todo list for your plants.</p>
    <p>Except it's a smart todo list, that will give you an estimate of when plants are ready to harvest. 
        It will also keep track of when you watered your plants and will remind you to water them at a set interval of days.</p>
    <h2>For New Zealanders</h2>
    <p>Sorry if you're not based in NZ! Plantr is specifically targetted for New Zealand seasons and climates. 
        It uses advice from the best <a href="/resources">New Zealand-based resources</a> to give you estimates of when to plant.</p>
    <h2>Open source</h2>
    <p>Plantr is an open source programme on the MIT license. What does this mean? It means that if you're tech-savvy you can
    peer into the inner workings of Plantr by having a <a href="https://github.com/Elliotclyde/Plantr">look at the source code</a>. So
    you can be confident there's no tracking or tracing of your information. It also means that anyone can copy the code from Plantr and make
    something even better! 
    </p>
    <h2>The author</h2>
    <p>Gidday.🖐</p> 
    <p>My name's Hugh. If you want to check out more of my projects you can jump on over to my
    <a href="http://www.elliotclyde.nz">personal site</a>. I hope you enjoy Plantr and hope it gives you a helping hand in the garden.</p>
    <p>-Hugh</p> 
</div>
@endsection