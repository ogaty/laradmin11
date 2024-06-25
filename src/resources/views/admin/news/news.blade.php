@extends('admin/layouts')

@php
if (!isset($check)) {
    $check = "";
}
@endphp

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
    <form action="{{ $url }}/store" method="post" enctype="multipart/form-data">
        @csrf
        @include('/admin/news/_form', ['check' => $check, 'categories' => $categories, 'news' => $news])
        <div class="form-buttons">
            <div>
                <input type="submit" value="下書き" name="submit1" class="submit_button">
            </div>
            <div>
                <input type="submit" value="公開" name="submit2" class="submit_button">
            </div>
        </div>
    </form>

@endsection
