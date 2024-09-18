@extends('layout')

@section('content')
    <form method="POST" action="/tags">
        @csrf
        <div class="add_page">
            <div>
                <label> Tag name </label>
                <input type="text" name="tag_name">
            </div>
            <div id="add">
                <label> Add tag </label>
                <input type="submit" name="Add tag">
            </div>
        </div>
    </form>
@endsection
