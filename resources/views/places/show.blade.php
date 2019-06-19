@extends('layout')

@section('content')

<div class="content">
    <div class="left_content">
        <label>Search sites</label>
        {{Form::open()}}
        <input type="text" id="query" placeholder="Fill place">
        <select name="area" id="area_option">
        @if($area != NULL)
        <option value="{{ $area_id }}" selected>{{ $area->area_en }} area</option>
        @endif
        <option value="all" >All area</option>
        </select>
        <input type="button" class="btn-gradation" value="search" id="search">
        <script src="{{ asset('assets/javascripts/get_content.js') }}"></script>
        {{Form::close()}}
        <hr>
        <h2>Search Results</h2>
        <div class="search_results">

        </div>
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
            <script src="{{ asset('assets/javascripts/create_marker.js') }}"></script>
            @else
            <script>
                var latitude = {{ $area->area_latitude }};
                var longitude = {{ $area->area_longitude }};
                var area_en = "{{ $area->area_en }}";
            </script>
            <script src="{{ asset('assets/javascripts/area_map.js') }}"></script>
            <script src="{{ asset('assets/javascripts/create_marker.js') }}"></script>
            @endif
        @endif
        <input type="button" class="btn-gradation" onclick='location.href="/"' value="Top page">
        
    </div>
    
    <div class="right_content">
        <div class="information">
            <header class="header_review">
                <div class="review_title">
                    CONTENTS
                </div>
            </header>
        @if($place !=NULL)
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
            
            <h2>Information</h2>
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
            {{-- */$i = 1/* --}}
            @foreach($reviews as $review)
            
            @if($i <= 3)
                <p><b>User:</b> {{ $review->nickname }}</p>
                <p><b>From:</b> {{ $review->country }}</p>
                <p><b>Feel:</b> {{ $review->feeling }}</p>
                <p><b>Text:</b> {{ $review->text }}</p>
                <hr>
            @endif
            @if($i == 4)
                <p>More Review Exists</p>
                <hr>
            @endif
            {{-- */$i++/* --}}
            @endforeach
            </div>
            @else
            <p>No Review</p>
            @endif
            </div>
            <hr>
            @if(count($reviews) > 1)
            <input type="button" class="btn-gradation" onclick='location.href="/areas/{{ $place->area->id }}/places/{{ $place_id }}/reviews"' value="Read More Review">
            @endif
            @if($place_id != 0)
            <input type="button" class="btn-gradation" onclick='location.href="/areas/{{ $place->area->id }}/places/{{ $place_id }}/reviews/create"' value="Write New Review">
            @endif
        @endif
        </div>
    </div>
</div>

@endsection