@extends('layout')

@section('content')

<div class="content">
    <div class="left_content">
        <label>Search areas</label>
        {{Form::input('text', 'name')}}
        <hr>
        <h2>famous area</h2>
        <a href="/places/show">KYOTO</a><br>
        <a href="">TOKYO</a><br>
        <a href="">KAMAKURA</a><br>

    
    </div>
    <div class="center_content">
        <div id="map"></div>
        <script src="{{ asset('assets/javascripts/map.js') }}"></script>
    </div>
    <div class="right_content">
    </div>
  </div>



@endsection