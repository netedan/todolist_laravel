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
            <th>Project ID</th>
            <th>Project author ID</th>
            <th>Project name</th>
        </tr>
        <tr>
            <td>{{ $project['id'] }}</td>
            <td>{{ $project['author_id'] }}</td>
            <td>{{ $project['name'] }}</td>
        </tr>
    </table>
@endsection
