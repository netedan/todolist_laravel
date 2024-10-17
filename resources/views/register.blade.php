@extends('layout')

@section('content')
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div>
            <label>Электронная почта</label>
            <input type="email" name="email" required>
        </div>
        <div>
            <label>Пароль</label>
            <input type="password" name="password" required>
        </div>
        <div>
            <label>Подтверждение пароля</label>
            <input type="password" name="password_confirmation" required>
        </div>
        <div>
            <button type="submit">Зарегистрироваться</button>
        </div>
    </form>
@endsection
