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
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Status</th>
            <th>Author ID</th>
            <th>Executor ID</th>
            <th>Project ID</th>
            <th>Due Date</th>
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
                <td>{{ $task->author->name }} {{ $task->author->surname }} {{ $task->author->patronymic }}</td>
                <td>{{ $task->executor->name }} {{ $task->executor->surname }} {{ $task->executor->patronymic }}</td>
                <td>{{ $task->project_id }}</td>
                <td>{{ $task->due_date ? \Carbon\Carbon::parse($task->due_date)->format('Y-m-d H:i') : 'Not set' }}</td>
                <td>{{ $task->tags_count }}</td>
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
        </tbody>
    </table>
@endsection
