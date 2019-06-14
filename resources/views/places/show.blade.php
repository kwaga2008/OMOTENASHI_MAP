@extends('layout')

@section('content')

<div class="content">
    <div class="left_content">
        <label>Search sites</label>
        {{Form::input('text', 'name')}}
        <hr>
        <h2>KYOTO sites</h2>
        @foreach($places as $a_place)
        <button type="button" onclick="location.href='/places/{{ $a_place->id }}'">{{ $a_place->place_en }}</button><br>
        @endforeach

    
    </div>
    <div class="center_content">
        <div id="map"></div>
        <script src="{{ asset('assets/javascripts/map.js') }}"></script>
    </div>
    <div class="right_content">
        <div class="information">
        <h1>CONTENTS</h1>
        <hr>
        <h2>Place</h2>
        @if(!empty($place))
        <p>{{ $place->place_ja }}</p>
        <p>{{ $place->place_en }}</p>
        <hr>
        @else
        <p>No Place data</p>
        <hr>
        @endif
        
        <h2>Infomation</h2>
        @if(!empty($info))
        <p>{{ $info->information }}</p>
        <hr>
        @else
        <p>No information</p>
        <hr>
        @endif
        
        <h2>Review</h2>
        
        @if(count($reviews) > 0)
        <div class="scroll">
        @foreach($reviews as $review)
            <p>User: {{ $review->nickname }}</p>
            <p>From: {{ $review->country }}</p>
            <p>Feel: {{ $review->feeling }}</p>
            <p>{{ $review->text }}</p>
            <hr>
        @endforeach
        </div>
        @else
        <p>No Review</p>
        @endif
        </div>
        <hr>
        @if(count($reviews) > 3)
        <button type="button" onclick="location.href='/reviews'">Read More Review</button>
        @endif
        <button type="button" onclick="location.href='/reviews/create'">Write New Review</button>
    </div>
  </div>



@endsection