@extends('layout')

@section('content')
    <div class="container">
        <h1>Добавить тег</h1>

        <form action="{{ route('tags_store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Название тега:</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="project_id">Выберите проект (необязательно):</label>
                <select id="project_id" name="project_id" class="form-control">
                    <option value="">Выберите проект</option>
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="task_id">Выберите задачу (необязательно):</label>
                <select id="task_id" name="task_id" class="form-control">
                    <option value="">Выберите задачу</option>
                    @foreach($tasks as $task)
                        <option value="{{ $task->id }}">{{ $task->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Создать тег</button>
        </form>
    </div>
@endsection
