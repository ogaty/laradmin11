@extends('layouts')

@section('before_styles')
@endsection

@section('content')
    <div>
        @foreach ($newsMedias as $media)
            <div><img src="{{ $media->getUrl() }}" alt="{{ $media->name }}"></div>
        @endforeach
    </div>
@endsection
