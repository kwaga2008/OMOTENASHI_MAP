@extends('layout')

@section('content')
    <div class="contents row">
        <div class="success">
            <h3>
                Review sent!
            </h3>
              <p class="thankyou">\ありがとう💕/</p>
              <div class="img-box">
                <img src='{{ secure_asset("assets/images/nashiko.png") }}' width="600" height="300" alt="" >
                <img src='{{ secure_asset("assets/images/nashiko2.png") }}' width="600" height="300" alt="" class="active">
              </div>
              <p>おもてなし子</p>
            <br>
            <a class="btn-gradation" href="/areas/{{ $spot->area->id }}/places/{{ $spot->id }}">Spot Page</a>
            <a class="btn-gradation" href="/">Top page</a>
        </div>
    </div>
@endsection