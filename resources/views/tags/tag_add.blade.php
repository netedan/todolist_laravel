@extends('layout')

@section('content')
    <div class="container">
        <h1>Добавить тег</h1>

        <form action="{{ route('tags_store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Название тега:</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>

            @include('forms.errors')

            <button type="submit" class="btn btn-primary">Создать тег</button>
        </form>
    </div>
@endsection
