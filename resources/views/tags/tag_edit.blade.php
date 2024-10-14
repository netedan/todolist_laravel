@extends('layout')

@section('content')
    <form method="POST" action="{{ route('tag_update', ['tag' => $tag->id]) }}">
        @csrf
        @method('PUT')
        <div>
            <label> Tag name </label>
            <input type="text" name="tag_name" value="{{$tag['name']}}">
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
        <div>
            <input type="submit" name="Edit tag">
        </div>
    </form>
@endsection
