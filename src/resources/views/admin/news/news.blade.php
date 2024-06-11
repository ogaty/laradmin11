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
    <form action="{{ $url }}/add" method="post" enctype="multipart/form-data">
        @csrf
        @include('/admin/news/_form')
        <div>
            <input type="submit" value="submit1" name="submit1">
        </div>
        <div>
            <input type="submit" value="submit2" name="submit2">
        </div>
    </form>

@endsection
