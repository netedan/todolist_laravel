@extends('layout')

@section('content')
    <div class="add_button">
        <ul>
            <li>
                <a href="{{ route('tag_add') }}" class="btn btn-primary">Add tag</a>
            </li>
        </ul>
    </div>

    <form method="GET" action="{{ route('tags') }}" style="margin-bottom: 20px;">
        <input type="number" name="tag_id" placeholder="Tag ID" value="{{ request('tag_id') }}">
        <input type="text" name="name" placeholder="Tag name" value="{{ request('name') }}">

        <button type="submit" class="btn btn-primary">Filter</button>
        <a href="{{ route('tags') }}" class="btn btn-secondary" style="margin-left: 10px;">Reset filter</a>
    </form>

    <table>
        <tr>
            <th>Tag ID</th>
            <th>Tag name</th>
            <th>Manage</th>
        </tr>
        @foreach($tags as $tag)
            <tr>
                <td><a href="{{ route('tag_show', $tag->id) }}">{{ $tag->id }}</a></td>
                <td>{{ $tag['name'] }}</td>
                <td>
                    <form method="POST" action="{{ route('tags_destroy', $tag->id) }}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                    <div>
                        <a href="{{ route('tag_edit', $tag->id) }}">Edit</a>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

