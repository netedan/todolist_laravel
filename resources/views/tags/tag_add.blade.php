@extends('layout')

@section('content')
    <form method="POST" action="{{ route('tags_store') }}">
        @csrf
        <div class="add_page">
            <div>
                <label> Tag name </label>
                <input type="text" name="tag_name">
            </div>
            <div>
                <label>Select project</label>
                <select name="project_id">
                    <option value="">Select a project</option>
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label>Select task</label>
                <select name="task_id">
                    <option value="">Select a task</option>
                    @foreach($tasks as $task)
                        <option value="{{ $task->id }}">{{ $task->name }}</option>
                    @endforeach
                </select>
            </div>
            <div id="add">
                <label> Add tag </label>
                <input type="submit" name="Add tag">
            </div>
        </div>
    </form>
@endsection
