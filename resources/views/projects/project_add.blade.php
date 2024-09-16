@extends('layout')

@section('content')
    <form method="POST" action="/projects">
    @csrf
        <div class="add_page">
            <div>
                <label> Project name </label>
                <input type="text" name="project_name">
            </div>
            <div>
                <label> Project author ID </label>
                <input type="number" name="author_id">
            </div>
            <div id="add">
                <label> Add project </label>
                <input type="submit" name="Add project">
            </div>
        </div>
    </form>
@endsection
