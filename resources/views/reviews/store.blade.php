@extends('layout')

@section('content')
    <div class="contents row">
        <div class="success">
            <h3>
                投稿が完了しました。
            </h3>
            <a class="btn-gradation" href="/areas/{{ $spot->area->id }}/places/{{ $spot->id }}">Spot Page</a>
            <a class="btn-gradation" href="/">Top page</a>
        </div>
    </div>
@endsection