@extends('layout')

@section('content')
    <div class="add_button">
        <ul>
            <li>
                <a href="{{ route('user_add') }}" class="btn btn-primary">Add user</a>
            </li>
        </ul>
    </div>

    <form method="GET" action="{{ route('users') }}" style="margin-bottom: 20px;">
        <input type="number" name="user_id" placeholder="User ID" value="{{ request('user_id') }}">
        <input type="text" name="name" placeholder="Name" value="{{ request('name') }}">
        <input type="text" name="surname" placeholder="Surname" value="{{ request('surname') }}">
        <input type="text" name="patronymic" placeholder="Patronymic" value="{{ request('patronymic') }}">

        <button type="submit" class="btn btn-primary">Filter</button>
        <a href="{{ route('users') }}" class="btn btn-secondary" style="margin-left: 10px;">Reset filter</a>
    </form>

    <table>
        <tr>
            <th><a href="{{ route('users', ['sort' => 'id', 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}">User ID</a></th>
            <th><a href="{{ route('users', ['sort' => 'name', 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}">User name</a></th>
            <th><a href="{{ route('users', ['sort' => 'surname', 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}">User surname</a></th>
            <th><a href="{{ route('users', ['sort' => 'patronymic', 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}">User patronymic</a></th>
            <th>User projects</th>
            <th>Manage</th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td><a href="{{ route('user_show', $user->id) }}">{{ $user->id }}</a></td>
                <td>{{ $user['name'] }}</td>
                <td>{{ $user['surname'] }}</td>
                <td>{{ $user['patronymic'] }}</td>
                <td>{{ $user->projects_count }}</td>
                <td>
                    <form method="POST" action="{{ route('users_destroy', $user->id) }}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    <div>
                        <a href="{{ route('user_edit', $user->id) }}">Edit</a>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
