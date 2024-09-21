@extends('layout')

@section('content')
    <table>
        <tr>
            <th>User ID</th>
            <th>User name</th>
            <th>User surname</th>
            <th>User patronymic</th>
        </tr>
        <tr>
            <td>{{ $user['id'] }}</td>
            <td>{{ $user['name'] }}</td>
            <td>{{ $user['surname'] }}</td>
            <td>{{ $user['patronymic'] }}</td>
        </tr>
    </table>
@endsection
