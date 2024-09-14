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
            <th>Tag ID</th>
            <th>Tag name</th>
        </tr>
        <tr>
            <td>{{ $tag['id'] }}</td>
            <td>{{ $tag['name'] }}</td>
        </tr>
    </table>
@endsection