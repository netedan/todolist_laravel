@extends('layout')

@section('content')
<div class="add_button">
    <ul>
        <li>
            <a href="{{ route('task_add') }}" class="btn btn-primary">Добавить задачу</a>
            @csrf
        </li>
    </ul>
</div>

<table>
    <tr>
        <th>Task ID</th>
        <th>Task name</th>
        <th>Task status</th>
        <th>Task author ID</th>
        <th>Task executor ID</th>
        <th>Manage</th>
    </tr>
    @foreach($tasks as $task)
        <tr>
            <td><a href="/tasks/{{ $task['id'] }}">{{ $task['id'] }}</a></td>
            <td>{{ $task['name'] }}</td>
            <td>{{ $task['status'] }}</td>
            <td>{{ $task['author_id'] }}</td>
            <td>{{ $task['executor_id'] }}</td>
            <td>
                <form method="POST" action="{{ route('tasks_destroy', $task->id) }}" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Удалить</button>
                </form>
                <div>
                    <a href="{{ route('task_edit', $task->id) }}">Edit</a>
                </div>
            </td>
        </tr>
    @endforeach
</table>
@endsection
