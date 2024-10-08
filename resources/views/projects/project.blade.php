@extends('layout')

@section('content')
    <table>
        <tr>
            <th>Project ID</th>
            <th>Project author name</th>
            <th>Project name</th>
            <th>Tasks</th>
        </tr>
        <tr>
            <td>{{ $project['id'] }}</td>
            <td>{{ $project->author->name }} {{ $project->author->surname }} {{ $project->author->patronymic }}</td>
            <td>{{ $project['name'] }}</td>
            <td>{{ $project->tasks->pluck('name')->implode(', ') }}</td>
        </tr>
    </table>
@endsection
