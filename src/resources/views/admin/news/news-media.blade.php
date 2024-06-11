@extends('admin/layouts')

@section('before_styles')
@endsection

@section('content')
    <h1>{{ $title }}</h1>
    {{ $message }}
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="/news-media/add" method="post" enctype="multipart/form-data">
        @csrf
        @include('/admin/news/_form');
        <div>
            <input type="submit">
        </div>
    </form>
@endsection
