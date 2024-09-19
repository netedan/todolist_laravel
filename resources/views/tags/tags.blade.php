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
                    <form method="POST" action="{{ route('tags_destroy', $tag->id) }}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                    <div>
                        <a href="{{ route('tag_edit', $tag->id) }}">Edit</a>
                        @csrf
                        @method('EDIT')
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
    </body>
@endsection
