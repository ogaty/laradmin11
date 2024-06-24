@extends('admin/layouts')

@section('before_styles')
<style>
    ul.pagination {
        padding: 0;
    }
    ul.pagination li {
        display: inline-block;
        list-style: none;
    }
</style>
@endsection

@section('content')
    <table>
        <tr>
            <th>
                id
            </th>
            <th>
                name
            </th>
            <th>
                code
            </th>
            <th>
                R
            </th>
            <th>
                G
            </th>
            <th>
                B
            </th>
        </tr>
        @foreach ($colors as $color)
            <tr>
                <td>
                    {{ $color->id }}
                </td>
                <td>
                    {{ $color->name }}
                </td>
                <td>
                    {{ $color->code }}
                </td>
                <td>
                    {{ $color->r }}
                </td>
                <td>
                    {{ $color->g }}
                </td>
                <td>
                    {{ $color->b }}
                </td>
            </tr>
        @endforeach
    </table>

    {{ $colors->links('vendor/pagination/simple-default') }}
@endsection
