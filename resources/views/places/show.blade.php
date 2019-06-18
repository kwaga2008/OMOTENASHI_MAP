@extends('layout')

@section('content')

<div class="content">
    <div class="left_content">
        <label>Search sites</label>
        {{Form::input('text', 'name')}}
        <input type="button" value="search" onclick="test1()">
        <script src="{{ asset('assets/javascripts/get_content.js') }}"></script>
        {{Form::close()}}
        <hr>
        <label>Search Results</label>
        <hr>
        @if($area != NULL)
            <h2>{{ $area->area_en }} sites</h2>
            @foreach($places as $a_place)
            <a href='/areas/{{ $a_place->area->id }}/places/{{ $a_place->id }}'>{{ $a_place->place_en }}</a><br>
            @endforeach
        @else
            <h2>JAPAN areas</h2>
            @foreach($areas as $a_area)
            <a href='/areas/{{ $a_area->id }}/places/0'>{{ $a_area->area_en }}</a><br>
            @endforeach
        @endif
    </div>

    <div class="center_content">
        <div id="map"></div>
        @if($area == NULL)
        <script src="{{ asset('assets/javascripts/japan_map.js') }}"></script>
        @else
            @if($place_id != 0)
            <script>
                var latitude = {{ $place->latitude }};
                var longitude = {{ $place->longitude }};
                var place_en = "{{ $place->place_en }}";
                var place_id = {{ $place->id }};
            </script>
            <script src="{{ asset('assets/javascripts/map.js') }}"></script>
            @else
            <script>
                var latitude = {{ $area->area_latitude }};
                var longitude = {{ $area->area_longitude }};
                var area_en = "{{ $area->area_en }}";
            </script>
            <script src="{{ asset('assets/javascripts/area_map.js') }}"></script>
            @endif
        @endif
        <a class="btn" href="/">Top page</a>
        
    </div>
    
    <div class="right_content">
        <div class="information">
            <h1>CONTENTS</h1>
        @if($place !=NULL)
            <hr>
            <div class="img_show">
            @if($place != NULL)
                @if($place->img_src !="")
                <img src='{{ asset("assets/images/" . $place->img_src) }}' width="300" height="300" alt="" >
                @else
                <img src='{{ asset("assets/images/no_image.png") }}' width="300" height="300" alt="" >
                @endif
            @endif
            </div>
            <hr>
            <h2>Place</h2>
            @if($place != NULL)
            <p>{{ $place->place_ja }}</p>
            <p>{{ $place->place_en }}</p>
            <hr>
            @else
            <p>No Place data</p>
            <hr>
            @endif
            
            <h2>Infomation</h2>
            @if(!empty($info))
            <div class="scroll">
            <p>{{ $info->information }}</p>
            </div>
            <hr>
            @else
            <p>No information</p>
            <hr>
            @endif
            
            <h2>Latest Review</h2>
            
            @if(count($reviews) > 0 && $place_id != 0)
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
            @if(count($reviews) > 1)
            <a class="btn" href="/areas/{{ $place->area->id }}/places/{{ $place_id }}/reviews">Read More Review</a>
            @endif
            @if($place_id != 0)
            <a class="btn" href="/areas/{{ $place->area->id }}/places/{{ $place_id }}/reviews/create">Write New Review</a>
            @endif
        @endif
    </div>
</div>

@endsection