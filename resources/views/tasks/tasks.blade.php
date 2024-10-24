@extends('layout')

@section('content')
    <div class="add_button">
        <ul>
            <li>
                <a href="{{ route('task_add') }}" class="btn btn-primary">Add task</a>
            </li>
        </ul>
    </div>

    <form method="GET" action="{{ route('tasks') }}" style="margin-bottom: 20px;">
        <input type="number" name="task_id" placeholder="Task ID" value="{{ request('task_id') }}">
        <input type="text" name="name" placeholder="Task name" value="{{ request('name') }}">
        <input type="text" name="status" placeholder="Task status" value="{{ request('status') }}">
        <input type="number" name="author_id" placeholder="Task author ID" value="{{ request('author_id') }}">
        <input type="number" name="executor_id" placeholder="Task executor ID" value="{{ request('executor_id') }}">

        <button type="submit" class="btn btn-primary">Filter</button>
        <a href="{{ route('tasks') }}" class="btn btn-secondary" style="margin-left: 10px;">Reset filter</a>
    </form>

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
                <td><a href="{{ route('task_show', $task->id) }}">{{ $task->id }}</a></td>
                <td>{{ $task['name'] }}</td>
                <td>{{ $task['status'] }}</td>
                <td>{{ $task['author_id'] }}</td>
                <td>{{ $task['executor_id'] }}</td>
                <td>
                    <form method="POST" action="{{ route('tasks_destroy', $task->id) }}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    <div>
                        <a href="{{ route('task_edit', $task->id) }}">Edit</a>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

