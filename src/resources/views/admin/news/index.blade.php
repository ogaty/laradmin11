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
                <thead>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            タイトル
                        </th>
                        <th>

                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($news as $n)
                        <tr>
                            <td>
                                {{ $n->id }}
                            </td>
                            <td>
                                {{ $n->title }}
                            </td>
                            <td>
                                <a href="/news1" class="inline-link">1</a>
                                <a href="/news2" class="inline-link">2</a>
                                <a href="/news3" class="inline-link">3</a>
                                <a href="/news4" class="inline-link">4</a>
                                <a href="/news5" class="inline-link">5</a>
                                <a href="/news6/{{ $n->id }}/edit" class="inline-link">6</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
