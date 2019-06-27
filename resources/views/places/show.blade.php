@extends('layout')

@section('content')

<div class="content">
    <div class="left_content">
        <label>Search Place</label>
        <input type="text" id="query" placeholder="Fill place">
        <select name="area" id="area_option">
        @if($area != NULL)
        <option value="{{ $area_id }}" selected>{{ $area->area_en }} Place</option>
        @endif
        <option value="all" >Search All Place</option>
        </select>
        <input type="button" class="btn-gradation" value="search" id="search">
        <script src="{{ asset('assets/javascripts/get_content.js',config('app.asset-secure')) }}"></script>
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
        <script src="{{ asset('assets/javascripts/japan_map.js',config('app.asset-secure')) }}"></script>
        <script src="{{ asset('assets/javascripts/create_area_marker.js',config('app.asset-secure')) }}"></script>
            @else
        @else
            @if($place_id != 0)
            <script>
                var latitude = {{ $place->latitude }};
                var longitude = {{ $place->longitude }};
                var place_en = "{{ $place->place_en }}";
                var place_id = {{ $place->id }};
                var area_id = {{ $place->area_id }};
            </script>
            <script src="{{ asset('assets/javascripts/map.js',config('app.asset-secure')) }}"></script>
            <script src="{{ asset('assets/javascripts/create_marker.js',config('app.asset-secure')) }}"></script>
            @else
            <script>
                var latitude = {{ $area->area_latitude }};
                var longitude = {{ $area->area_longitude }};
                var area_en = "{{ $area->area_en }}";
            </script>
            <script src="{{ asset('assets/javascripts/area_map.js',config('app.asset-secure')) }}"></script>
            <script src="{{ asset('assets/javascripts/create_marker.js',config('app.asset-secure')) }}"></script>
            @endif
        @endif
        <input type="button" class="btn-gradation" id="cp" value="Current Position" onclick="currentPosition()">
        <br>
        <br>
        @if($place_id != 0)
        <a class="instalogo">
        <h2><img src="{{ asset('assets/images/logo/insta.png',config('app.asset-secure')) }}" alt=""> Instagram</h2></a>
        <!-- InstaWidget -->
        <a href="https://instawidget.net/v/tag/{{ $place->place_en }}"id={{ $place->insta1 }}>#"{{ $place->place_en }}"</a>
        <script src="https://instawidget.net/js/instawidget.js?{{ $place->insta2 }}&width=600px"></script>
        <br><br>
        <a class="instalogo">
        <!-- <h2><img src="{{ asset('assets/images/logo/youtube.png') }}" alt=""> Youtube</h2></a>
        @if($place->youtube != "")
        <iframe width="600" height="330" src="{{ $place->youtube }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        @else
        <p>No exist.</p>
        @endif -->
        @endif
        <input type="button" class="btn-gradation" onclick='location.href="/areas/0/places/0"' value="Select Area">
        <input type="button" class="btn-gradation" onclick='location.href="/"' value="Top page">
        <br><br>
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
                <a href='{{ asset("assets/images/" . $place->img_src,config("app.asset-secure")) }}' data-lightbox="abc" data-title="{{ $place->place_en }}">
                <img src='{{ asset("assets/images/" . $place->img_src,config("app.asset-secure")) }}' width="515" height="300" alt="" >
                </a>
                @else
                <img src='{{asset("assets/images/no_image.png",config("app.asset-secure")) }}' width="300" height="300" alt="" >
                @endif
            @endif
            </div>
            <hr>
            <h2>Place</h2>
            @if($place != NULL)
            <p><h3>{{ $place->place_ja }}<h3></p>
            <p>{{ $place->place_en }}</p>
            <hr>
            @else
            <p>No Place data</p>
            <hr>
            @endif

            <h2>Web site</h2>
            @if($place != NULL)
            <a href='{{ $place->link }}' target="_blank"> {{ $place->link }}</a>
            <hr>
            @else
            <p>No URL data</p>
            <hr>
            @endif

            <h2>Information</h2>
            @if(!empty($info))
            <div class="scroll" id="infobox">
            <p>{{ $info->information }}</p>
            </div>
            @else
            <p>No information</p>
            <br>
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
            <center>
            @if(count($reviews) > 1)
            <input type="button" class="btn-gradation" onclick='location.href="/areas/{{ $place->area->id }}/places/{{ $place_id }}/reviews"' value="Read More Review">
            @endif
            @if($place_id != 0)
            <input type="button" class="btn-gradation" onclick='location.href="/areas/{{ $place->area->id }}/places/{{ $place_id }}/reviews/create"' value="Write New Review">
            </center>
            @endif
        @endif
        <br>
        </div>
    </div>
</div>

@endsection