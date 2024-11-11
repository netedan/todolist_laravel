@extends('layout')

@section('content')
    <div class="sub_navigation">
        <div class="add_button">
            <ul>
                <li>
                    <a href="{{ route('project_add') }}" class="btn btn-primary">Add project</a>
                </li>
            </ul>
        </div>
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
            <th><a href="{{ route('projects', ['sort' => 'id', 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}">Project ID</a></th>
            <th><a href="{{ route('projects', ['sort' => 'author_id', 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}">Author ID</a></th>
            <th><a href="{{ route('projects', ['sort' => 'name', 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}">Project name</a></th>
            <th>Tasks</th>
            <th>Tags</th>
            <th>Manage</th>
        </tr>
        @foreach($projects as $project)
            <tr>
                <td><a href="{{ route('project_show', $project->id) }}">{{ $project->id }}</a></td>
                <td>    @if ($project->author)
                        {{ $project->author->name }} {{ $project->author->surname }} {{ $project->author->patronymic }}
                    @else
                        Неизвестный автор
                    @endif</td>
                <td>{{ $project['name'] }}</td>
                <td>{{ $project->tasks_count }}</td>
                <td>{{ $project->tags_count }}</td>
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



