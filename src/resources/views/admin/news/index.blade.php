@extends('admin/layouts')

@section('before_styles')
@endsection

@section('content')
    <h1>News</h1>

    <div>
        @if ($news->count() == 0)
            nodata
        @else
            <table>
                <tr>
                    <th>
                        #
                    </th>
                    <th>
                        タイトル
                    </th>
                </tr>
                @foreach ($news as $n)
                    <tr>
                        <td>
                            {{ $n->id }}
                        </td>
                        <td>
                            {{ $n->title }}
                        </td>
                    </tr>
                @endforeach
            </table>
        @endif
    </div>
@endsection
