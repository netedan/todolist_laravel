@extends('layout')

@section('content')
    <head>
        <style>
            table {
                border-collapse: collapse;
                width: 100%;
            }

            tr {
                border: 1px solid gray;
            }
            tr {
                font-size: 20px;
                text-align: center;
            }
            body {
                background-color: beige;
            }
        </style>
    </head>
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
