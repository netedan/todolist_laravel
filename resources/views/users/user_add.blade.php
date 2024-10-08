@extends('layout')

@section('content')
    <form method="POST" action="{{ route('user_store') }}">
    @csrf
        <div class="add_page">
            <div>
                <label> User name </label>
                <input type="text" name="user_name">
            </div>
            <div>
                <label> User surname </label>
                <input type="text" name="user_surname">
            </div>
            <div>
                <label> User patronymic </label>
                <input type="text" name="user_patronymic">
            </div>
            <div id="add">
                <label> Add project </label>
                <input type="submit" name="Add project">
            </div>
        </div>
    </form>
@endsection
