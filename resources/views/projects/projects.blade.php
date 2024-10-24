@extends('layout')

@section('content')
    <div class="sub_navigation">
        <a href="{{ route('project_add') }}" class="btn btn-primary">Add project</a>
    </div>

    <form method="GET" action="{{ route('projects') }}" style="margin-bottom: 20px;">
        <input type="text" name="name" placeholder="Project name" value="{{ request('name') }}">
        <input type="number" name="author_id" placeholder="author ID" value="{{ request('author_id') }}">
        <input type="number" name="project_id" placeholder="project ID " value="{{ request('project_id') }}">

        <button type="submit" class="btn btn-primary">Filter</button>
        <a href="{{ route('projects') }}" class="btn btn-secondary" style="margin-left: 10px;">Reset filters</a>
    </form>

    <table>
        <tr>
            <th>Project ID</th>
            <th>Author ID</th>
            <th>Project name</th>
            <th>Manage</th>
        </tr>
        @foreach($projects as $project)
            <tr>
                <td><a href="{{ route('project_show', $project->id) }}">{{ $project->id }}</a></td>
                <td>{{ $project['author_id'] }}</td>
                <td>{{ $project['name'] }}</td>
                <td>
                    <form method="POST" action="{{ route('projects_destroy', $project->id) }}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    <div>
                        <a href="{{ route('project_edit', $project->id) }}">Edit</a>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
@endsection



