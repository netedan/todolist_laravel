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
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>
</div>
@yield('content')
</body>
</html>
