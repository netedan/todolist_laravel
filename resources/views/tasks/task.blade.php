@extends('layout')

@section('content')
    <table>
        <tr>
            <th>Task ID</th>
            <th>Task name</th>
            <th>Task status</th>
            <th>Task author ID</th>
            <th>Task executor ID</th>
        </tr>
        <tr>
            <td>{{ $task['id'] }}</td>
            <td>{{ $task['name'] }}</td>
            <td>{{ $task['status'] }}</td>
            <td>{{ $task['author_id'] }}</td>
            <td>{{ $task['executor_id'] }}</td>
        </tr>
    </table>
@endsection
