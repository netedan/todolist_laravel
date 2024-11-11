@extends('layout')

@section('content')
    <h2>Результаты поиска для "{{ $query }}"</h2>

    @if(isset($users) && !$users->isEmpty())
        <h3>Пользователи:</h3>
        <ul class="list-group">
            @foreach($users as $user)
                <li class="list-group-item">
                    <strong>{{ $user->name }} {{ $user->surname }}</strong> ({{ $user->email }})
                </li>
            @endforeach
        </ul>
    @else
        <div class="alert alert-warning">
            Пользователи не найдены.
        </div>
    @endif

    @if(isset($projects) && !$projects->isEmpty())
        <h3>Проекты:</h3>
        <ul class="list-group">
            @foreach($projects as $project)
                <li class="list-group-item">
                    <strong>{{ $project->name }}</strong> (Автор ID: {{ $project->author_id }})
                </li>
            @endforeach
        </ul>
    @else
        <div class="alert alert-warning">
            Проекты не найдены.
        </div>
    @endif

    @if(isset($tasks) && !$tasks->isEmpty())  <!-- Исправлено: $tags на $tasks -->
    <h3>Задачи:</h3>
    <ul class="list-group">
        @foreach($tasks as $task)
            <li class="list-group-item">
                <strong>{{ $task->name }} {{ $task->status }} (Автор ID: {{ $task->author_id }}, Исполнитель ID: {{ $task->executor_id }})</strong>
            </li>
        @endforeach
    </ul>
    @else
        <div class="alert alert-warning">
            Задачи не найдены.
        </div>
    @endif

    @if(isset($tags) && !$tags->isEmpty())
        <h3>Теги:</h3>
        <ul class="list-group">
            @foreach($tags as $tag)
                <li class="list-group-item">
                    <strong>{{ $tag->name }}</strong>
                </li>
            @endforeach
        </ul>
    @else
        <div class="alert alert-warning">
            Теги не найдены.
        </div>
    @endif

@endsection
