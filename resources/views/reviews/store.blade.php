@extends('layout')

@section('content')
    <div class="contents row">
        <div class="success">
            <h3>
                投稿が完了しました。
            </h3>
              <p class="thankyou">\ありがとう💕/</p>
                <img src='{{ asset("assets/images/nashiko.png") }}' width="600" height="300" alt="" >
              <p>おもてなし子</p>
            <br>
            <a class="btn-gradation" href="/areas/{{ $spot->area->id }}/places/{{ $spot->id }}">Spot Page</a>
            <a class="btn-gradation" href="/">Top page</a>
        </div>
    </div>
@endsection