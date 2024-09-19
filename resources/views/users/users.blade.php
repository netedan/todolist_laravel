@extends('layout')

@section('content')
    <head>
    </head>
    <div class="add_button">
        <ul>
            <li>
                <a href="{{ route('user_add') }}" class="btn btn-primary">Add user</a>
                @csrf
            </li>
        </ul>
    </div>
    <table>
        <tr>
            <th>User ID</th>
            <th>User name</th>
            <th>User surname</th>
            <th>User patronymic</th>
            <th>Manage</th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td><a href="/users/{{ $user['id'] }}">{{ $user['id'] }}</a></td>
                <td>{{ $user['name'] }}</td>
                <td>{{ $user['surname'] }}</td>
                <td>{{ $user['patronymic'] }}</td>
                <td>
                    <form method="POST" action="{{ route('users_destroy', $user->id) }}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                    <div>
                        <a href="{{ route('user_edit', $user->id) }}">Edit</a>
                        @csrf
                        @method('EDIT')
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
