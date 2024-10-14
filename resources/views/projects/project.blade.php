@extends('layout')

@section('content')
    <table>
        <tr>
            <th>Project ID</th>
            <th>Project author ID</th>
            <th>Project name</th>
            <th>Tag</th>
        </tr>
        <tr>
            <td>{{ $project->id }}</td>
            <td>{{ $project['author_id'] }}</td>
            <td>{{ $project['name'] }}</td>
            <td>
                @foreach ($project->tags as $tag)
                    <a href="{{ route('tag_show', $tag->id) }}">{{ $tag->name }}</a>
                @endforeach
            </td>


        </tr>
    </table>
@endsection
