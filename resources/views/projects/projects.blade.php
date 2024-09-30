@extends('layout')

@section('content')
    <div class="sub_navigation">
        <a href="{{ route('project_add') }}" class="btn btn-primary">Add project</a>
    </div>
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
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                    <div>
                        <a href="{{ route('project_edit', $project->id) }}">Edit</a>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
