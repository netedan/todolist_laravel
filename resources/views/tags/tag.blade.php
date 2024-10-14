@extends('layout')

@section('content')
    <table>
        <tr>
            <th>Tag ID</th>
            <th>Tag name</th>
            <th>Projects</th>
            <th>Tasks</th>
        </tr>
        <tr>
            <td>{{ $tag['id'] }}</td>
            <td>{{ $tag['name'] }}</td>
            <td>
                @foreach ($tag->projects as $project)
                    <a href="{{ route('project_show', $project->id) }}">{{ $project->name }}</a>
                @endforeach
            </td>
            <td>
                @foreach ($tag->tasks as $task)
                    <a href="{{ route('task_show', $task->id) }}">{{ $task->name }}</a>
                @endforeach
            </td>
        </tr>
    </table>
@endsection
