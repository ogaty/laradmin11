@extends('admin/layouts')

@section('before_styles')
@endsection

@section('content')
    <h1>Download</h1>

    <div>
        <ul>
            <li><a href="/downloads/csv">csv(Storage::download)</a></li>
            <li><a href="/downloads/csv2">csv2(response()->file)</a></li>
            <li><a href="/downloads/csv3">csv3</a></li>
            <li><a href="/downloads/csv4">csv4 (streamed)</a></li>
            <li><a href="/downloads/csv5">csv5 (league)</a></li>
            <li><a href="/downloads/zip">zip</a></li>
            <li><a href="/downloads/zip2">zip2 (create zip)</a></li>
            <li><a href="/downloads/pdf">pdf</a></li>
            <li><a href="/downloads/pdf2">pdf2 (open browser)</a></li>
        </ul>
    </div>
@endsection
