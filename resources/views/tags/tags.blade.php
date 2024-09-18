@extends('layout')

@section('content')
    <head>
    </head>
    <body>
    <div class="add_button">
        <ul>
            <li>
                <a href="{{ route('tag_add') }}" class="btn btn-primary">Add tag</a>
            </li>
        </ul>
    </div>
    <table>
        <tr>
            <th>Tag ID</th>
            <th>Tag name</th>
            <th>Manage</th>
        </tr>
        @foreach($tags as $tag)
            <tr>
                <td><a href="/tags/{{ $tag['id'] }}">{{ $tag['id'] }}</a></td>
                <td>{{ $tag['name'] }}</td>
                <td>
                <td><a href="{{ route('tag_show', $tag->id) }}">{{ $tag->id }}</a></td>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Удалить</button>
                </form>
                <form method="GET" action="{{ route('tag_edit', $tag->id) }}">
                    @csrf
                    @method('EDIT')
                    <input class="button_edit" type="submit" value="Edit">
                </form>
                </td>
            </tr>
        @endforeach
    </table>
    </body>
@endsection
