@extends('layout')
{{--todo перенести стили в index.css--}}
@section('content')

    {{--        <style>--}}
    {{--            tr {--}}
    {{--                font-size: 20px;--}}
    {{--                text-align: center;--}}
    {{--            }--}}
    {{--            body {--}}
    {{--                background-color: beige;--}}
    {{--            }--}}
    {{--        </style>--}}
    {{--todo сделать нормальную кнопку, разобраться, как работаeт blade (фигурные скобки, кавычки)--}}
    <div class="sub_navigation">
        <a class="add_button" href="/projects/create">Add project</a>
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
                <td><a href="/projects/{{ $project['id'] }}">{{ $project['id'] }}</a></td>
                <td>{{ $project['author_id'] }}</td>
                <td>{{ $project['name'] }}</td>
                {{--        <p>{{ $project->tasks }}</p>--}}
                <td>
                    <form method="POST" action="{{ route('projects_destroy', $project->id) }}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                    <form method="GET" action="{{ route('project_edit', $project->id) }}">
                        @csrf
                        @method('EDIT')
                        <input class="button_edit" type="submit" value="Edit">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
