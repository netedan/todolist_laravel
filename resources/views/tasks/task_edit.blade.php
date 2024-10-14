@extends('layout')

@section('content')
    @php
        use Carbon\Carbon;
    @endphp

    <form method="POST" action="{{ route('task_update', ['task' => $task->id]) }}">
        @csrf
        @method('PUT')

        <div>
            <label>Task name</label>
            <input type="text" name="task_name" value="{{$task->name}}">
        </div>

        <div>
            <label>Task status</label>
            <select name="status">
                <option value="Backlog" {{ $task->status == 'Backlog' ? 'selected' : '' }}>Backlog</option>
                <option value="In process" {{ $task->status == 'In process' ? 'selected' : '' }}>In process</option>
                <option value="Done" {{ $task->status == 'Done' ? 'selected' : '' }}>Done</option>
                <option value="Archive" {{ $task->status == 'Archive' ? 'selected' : '' }}>Archive</option>
            </select>
        </div>

        <div>
            <label>Task author ID</label>
            <input type="number" name="author_id" value="{{ $task->author_id }}" required>
        </div>

        <div>
            <label>Task executor ID</label>
            <input type="number" name="executor_id" value="{{ $task->executor_id }}" required>
        </div>

        <div>
            <label>Deadline</label>
            <input type="datetime-local" name="due_date" value="{{ $task->due_date ? Carbon::parse($task->due_date)->format('Y-m-d\TH:i') : '' }}" required>
        </div>
        <div>
            <input type="submit" value="Save changes">
        </div>
    </form>
@endsection
