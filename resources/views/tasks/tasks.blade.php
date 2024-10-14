@extends('layout')

@section('content')
    <div class="add_button">
        <ul>
            <li>
                <a href="{{ route('task_add') }}" class="btn btn-primary">Add task</a>
            </li>
        </ul>
    </div>

    <table>
        <thead>
        <tr>
            <th>Task ID</th>
            <th>Task Title</th>
            <th>Task Status</th>
            <th>Due Date</th>
            <th>Author ID</th>
            <th>Executor ID</th>
            <th>Tags</th>
            <th>Manage</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tasks as $task)
            <tr>
                <td><a href="{{ route('task_show', $task->id) }}">{{ $task->id }}</a></td>
                <td>{{ $task->name }}</td>
                <td>{{ $task->status }}</td>
                <td>{{ $task->due_date ? \Carbon\Carbon::parse($task->due_date)->format('Y-m-d H:i') : 'Not set' }}</td>
                <td>{{ $task->author_id }}</td>
                <td>{{ $task->executor_id }}</td>
                <td>{{ $task->tags_count }}</td>
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
        </tbody>
    </table>
@endsection

