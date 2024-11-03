@extends('layout')

@section('content')
    <form method="POST" action="{{ route('projects_store') }}">
        @csrf
        <div class="add_page">
            <div>
                <label>Project Name</label>
                <input type="text" name="project_name" required>
            </div>
            <div>
                <label>Project Author ID</label>
                <input type="number" name="author_id" required>
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
            <div id="add">
                <label>Add Project</label>
                <input type="submit" value="Add Project">
            </div>

            @include('forms.errors')

        </div>
    </form>
@endsection
