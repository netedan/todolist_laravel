@extends('layout')

@section('content')
    @php
        use Carbon\Carbon;
    @endphp
<form method="POST" action="{{ route('task_update', ['task' => $task->id]) }}" required>
    @csrf
    @method('PUT')
    <div>
        <label>Name </label>
        <input type="text" name="task_name" value="{{$task->name}}" required>
    </div>
    <div>
        <label>Status</label>
        <select name="status">
            <option value="Backlog" {{ $task->status == 'Backlog' ? 'selected' : '' }}>Backlog</option>
            <option value="In process" {{ $task->status == 'In process' ? 'selected' : '' }}>In process</option>
            <option value="Done" {{ $task->status == 'Done' ? 'selected' : '' }}>Done</option>
            <option value="Archive" {{ $task->status == 'Archive' ? 'selected' : '' }}>Archive</option>
        </select>
    </div>
    <div>
        <label>Author ID</label>
        <input type="number" name="author_id" value="{{$task->author_id}}" required>
    </div>
    <div>
        <label>Executor ID</label>
        <input type="number" name="executor_id" value="{{$task->executor_id}}" required>
    </div>
    <div>
        <label>Select tag</label>
        <select name="tag_id">
            <option value="">Select a tag</option>
            @foreach($tags as $tag)
                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label>Project ID</label>
        <input type="number" name="project_id" value="{{$task->project_id}}" required>
    </div>
    <div>
        <label>Deadline</label>
        <input type="datetime-local" name="due_date" value="{{ $task->due_date ? Carbon::parse($task->due_date)->format('Y-m-d\TH:i') : '' }}" required>
    </div>

    @include('forms.errors')

    <div>
        <input type="submit" value="Save changes">
    </div>
</form>
@endsection
