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
    <table>
        <tr>
            <th>Project ID</th>
            <th>Author name</th>
            <th>Project name</th>
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
