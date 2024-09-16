@extends('layout')

@section('content')
    <form method="POST" action="{{ route('user_update', ['user' => $user->id]) }}">
        @csrf
        @method('PUT')
        <div>
            <label> User name </label>
            <input type="text" name="user_name" value="{{$user['name']}}">
        </div>
        <div>
            <label> User surname </label>
            <input type="text" name="user_surname" value="{{$user['surname']}}">
        </div>
        <div>
            <label> User patronymic </label>
            <input type="text" name="user_patronymic" value="{{$user['patronymic']}}">
        </div>
        <div>
            <input type="submit" name="Edit user">
        </div>
    </form>
@endsection
