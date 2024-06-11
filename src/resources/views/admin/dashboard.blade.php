@extends('admin.layouts')

@section('before_styles')
@endsection

@section('content')
    <div>
        welcome, {{ Auth::user()->email }}.
    </div>

    <ul>
        <li><a href="/news1">news.1</a></li>
        <li><a href="/news2">news.2</a></li>
        <li><a href="/news3">news.3</a></li>
        <li><a href="/news-media">news.media</a></li>
    </ul>
@endsection
