@extends('layout')

@section('content')
<form method="POST" action="{{ route('tasks_store') }}">
    @csrf
    <div class="add_page">
        <div>
            <label> Task name </label>
            <input type="text" name="task_name">
        </div>
        <div>
            <label> Task status </label>
            <select name="task_status" required>
                <option value="Backlog">Backlog</option>
                <option value="In process">In process</option>
                <option value="Done">Done</option>
                <option value="Archive">Archive</option>
            </select>
        </div>
        <div>
            <label> Task author ID </label>
            <input type="number" name="author_id">
        </div>
        <div>
            <label> Task executor ID </label>
            <input type="number" name="executor_id">
        </div>
        <div>
            <label>Select Tag</label>
            <select name="tag_id">
                <option value="">Select a tag</option>
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label> Task project ID </label>
            <input type="number" name="project_id">
        </div>
        <div>
            <label>Due date</label>
            <input type="datetime-local" name="due_date" required>
        </div>

        @include('forms.errors')

        <div id="add">
            <label> Add task </label>
            <input type="submit" name="Add task">
        </div>
    </div>
</form>
@endsection
