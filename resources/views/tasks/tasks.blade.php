@extends('layout')

@section('content')
    <div class="add_button">
        <ul>
            <li>
                <a href="{{ route('task_add') }}" class="btn btn-primary">Добавить задачу</a>
            </li>
        </ul>
    </div>

    <table>
        <tr>
            <th><a href="{{ route('tasks', ['sort' => 'id', 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}">Task ID</a></th>
            <th><a href="{{ route('tasks', ['sort' => 'name', 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}">Task name</a></th>
            <th><a href="{{ route('tasks', ['sort' => 'status', 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}">Task status</a></th>
            <th><a href="{{ route('tasks', ['sort' => 'author_id', 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}">Task author ID</a></th>
            <th><a href="{{ route('tasks', ['sort' => 'executor_id', 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}">Task executor ID</a></th>
            <th>Manage</th>
        </tr>
        @foreach($tasks as $task)
            <tr>
                <td><a href="{{ route('task_show', $task->id) }}">{{ $task->id }}</a></td>
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

