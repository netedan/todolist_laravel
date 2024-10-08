@extends('layout')

@section('content')
    <table>
        <tr>
            <th>Task ID</th>
            <th>Task name</th>
            <th>Task status</th>
            <th>Task author ID</th>
            <th>Task executor ID</th>
            <th> Project ID</th>
            <th> Project name</th>
        </tr>
        <tr>
            <td>{{ $task['id'] }}</td>
            <td>{{ $task['name'] }}</td>
            <td>{{ $task['status'] }}</td>
            <td>{{ $task->author->name }} {{ $task->author->surname }} {{ $task->author->patronymic }}</td>
            <td>{{ $task->executor->name }} {{ $task->executor->surname }} {{ $task->executor->patronymic }}</td>
            <td>{{ $task['project_id'] }}</td>
            <td>{{ $task->project->name }}</td>
        </tr>
    </table>
@endsection
