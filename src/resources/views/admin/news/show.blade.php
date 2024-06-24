@extends('admin/layouts')

@section('before_styles')
@endsection

@section('content')

    <main>
        <div>
            {{ $news->title }}
        </div>

        <div>
            {{ $news->body }}
        </div>

        <div>
            <a href="{{ $old }}">
                <span>< old</span>
            </a>
            <a href="{{ $new }}">
                <span>new ></span>
            </a>
        </div>
    </main>

@endsection
