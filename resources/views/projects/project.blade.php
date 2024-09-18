@extends('layout')

@section('content')
    @csrf
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
