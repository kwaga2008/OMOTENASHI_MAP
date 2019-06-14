@extends('layout')

@section('content')
    <div class="contents row">
        <div class="success">
            <h3>
                投稿が完了しました。
            </h3>
            <a class="btn" href="/places/{{ $id }}">コンテンツページに戻る</a>
            <a class="btn" href="/">トップページに戻る</a>
        </div>
    </div>
@endsection