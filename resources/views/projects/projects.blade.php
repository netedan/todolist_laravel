@extends('layout')

@section('content')
    <div class="sub_navigation">
        <a href="{{ route('project_add') }}" class="btn btn-primary">Add project</a>
    </div>
    <table>
        <tr>
            <th><a href="{{ route('projects', ['sort' => 'id', 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}">Project ID</a></th>
            <th><a href="{{ route('projects', ['sort' => 'author_id', 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}">Author ID</a></th>
            <th><a href="{{ route('projects', ['sort' => 'name', 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}">Project name</a></th>

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
