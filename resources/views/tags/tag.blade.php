@extends('layout')

@section('content')
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
