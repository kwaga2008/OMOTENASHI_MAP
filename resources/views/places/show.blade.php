@extends('layout')

@section('content')

<div class="content">
    <div class="left_content">
        <form>
        <p>Area:
        <input type="checkbox" name="riyu" value="1" checked="checked">嵐山
        <input type="checkbox" name="riyu" value="2">京都駅
        <input type="checkbox" name="riyu" value="3">哲学の道
        </p>
        <hr>
            <p>検索：<input type="text"></p> 
            <a href="/">清水寺</a><br>
            <a href="/">金閣</a><br>
            <a href="/">銀閣</a><br>
            <a href="/">嵐山</a><br>
            <a href="/">伏見</a><br>
            <input type="submit" value="search">

        </form>
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
        <p></p>
        <hr>
        <h2>Review</h2>
        <div class="scroll">
            <p>User:Mr.A</p>
            <p>very good place!</p>
            <hr>
            <p>User:Mrs.B</p>
            <p>hot place!</p>
            <hr>
            <p>User:Ms.C</p>
            <p>Cool place!</p>
            <hr>
        </div>
        <button type="button">Read More Review</button>
        </div>
    </div>
  </div>



@endsection