<!DOCTYPE HTML>
<html>
<head>
    <link rel="stylesheet" href="{{ asset('/index.css') }}">
</head>
<body>
<h1>Todolist</h1>
<div id="navigation">
    <ul>
        <li>
            <a href="/projects">Projects</a>
        </li>
        <li>
            <a href="/users">Users</a>
        </li>
        <li>
            <a href="/tasks">Tasks</a>
        </li>
        <li>
            <a href="/tags">Tags</a>
        </li>
    </ul>
    <form action="{{ route('search') }}" method="GET">
        <input type="text" name="q" placeholder="Введите запрос..." required>
        <button type="submit">Найти</button>
    </form>

    <div>
        <label>
            <input type="radio" name="search_type" value="users" checked> Пользователи
        </label>
        <label>
            <input type="radio" name="search_type" value="projects"> Проекты
        </label>
        <label>
            <input type="radio" name="search_type" value="tags"> Теги
        </label>
        <label>
            <input type="radio" name="search_type" value="tasks"> Tasks
        </label>
    </div>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>
</div>
@yield('content')
</body>
</html>
