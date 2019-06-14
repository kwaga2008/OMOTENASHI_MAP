@extends('layout')

@section('content')

<div class="content">
    <div class="left_content">
        <label>Search sites</label>
        {{Form::input('text', 'name')}}
        <hr>
        <h2>KYOTO sites</h2>
        @foreach($places as $a_place)
        <input type="button" id="mybutton" value="{{ $a_place->place_en }}"><br>
        @endforeach

    
    </div>
    <div class="center_content">
        <div id="map"></div>
        <script src="{{ asset('assets/javascripts/map.js') }}"></script>
    </div>
    <div class="right_content">
        <div class="information">
        <h2>CONTENTS</h2>
        <p>Place:{{ $place->place_ja }}</p>
        <p>{{ $place->place_en }}</p>
        <hr>
        <h2>Infomation</h2>
        <p>{{ $info->information }}</p>
        <hr>
        <h2>Review</h2>
        <div class="scroll">
        @foreach($reviews as $review)
            <p>User: {{ $review->nickname }}</p>
            <p>From: {{ $review->country }}</p>
            <p>Feel: {{ $review->feeling }}</p>
            <p>{{ $review->text }}</p>
            <hr>
        @endforeach
        </div>
        <button type="button" onclick="location.href='/reviews'">Read More Review</button>
        </div>
        <button type="button" onclick="location.href='/reviews/create'">Write New Review</button>
    </div>
  </div>



@endsection