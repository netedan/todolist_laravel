@extends('layout')
{{--todo добавить верстку в index.css--}}
@section('content')
    <head>
        <style>
            body {
                background-color: beige;
            }

            .add_page {
                font-size: 20px;
                text-align: center;
                padding: 10px;
            }
        </style>
    </head>
    <body>
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

    </body>
@endsection
