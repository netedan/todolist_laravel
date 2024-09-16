@extends('layout')

@section('content')
    <form method="POST" action="{{ route('project_update', ['project' => $project->id]) }}">
        @csrf
        @method('PUT')
        <div>
            <label> Project author ID </label>
            <input type="number" name="author_id" value="{{$project['author_id']}}">
        </div>
        <div>
            <label> Project name </label>
            <input type="text" name="project_name" value="{{$project['project_name']}}">
        </div>
        <div>
            <input type="submit" name="Edit project">
        </div>
    </form>
@endsection
