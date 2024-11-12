@extends('layout')

@section('content')
    <form method="POST" action="{{ route('user_store') }}">
    @csrf
        <div class="add_page">
            <div>
                <label for="name"> User name </label>
                <input type="text" id="name" name="name" value="{{ old('name') }}">
            </div>
            <div>
                <label for="surname"> User surname </label>
                <input type="text" id="surname" name="surname" value="{{ old('surname') }}">
            </div>
            <div>
                <label for="patronymic"> User patronymic </label>
                <input type="text" id="patronymic" name="patronymic" value="{{ old('patronymic') }}">
            </div>
            <div>
                <label for="email"> User email </label>
                <input type="email" id="email" name="email" value="{{ old('email') }}">
            </div>
            <div>
                <label for="password"> User password</label>
                <input type="password" id="password" name="password">
            </div>
            <div>
                <label for="password_confirmation"> Confirm password</label>
                <input type="password" id="password_confirmation" name="password_confirmation">
            </div>

            @include('forms.errors')

            <div id="add">
                <input type="submit" value="Add user">
            </div>
        </div>
    </form>
@endsection
