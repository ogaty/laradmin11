@extends('admin/layouts')

@section('before_styles')
@endsection

@section('content')
    <h1>Upload</h1>

    <div>
        @if ($uploads->count() == 0)
            nodata
        @else
            <table>
                <tr>
                    <th>
                        #
                    </th>
                    <th>
                        名前
                    </th>
                </tr>
                @foreach ($uploads as $upload)
                    <tr>
                        <td>
                            {{ $upload->id }}
                        </td>
                        <td>
                            {{ $upload->name }}
                        </td>
                    </tr>
                @endforeach
            </table>
        @endif
    </div>
@endsection
