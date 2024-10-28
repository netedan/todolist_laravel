@extends('layout')

@section('content')
    <form method="POST" action="{{ route('tag_update', ['tag' => $tag->id]) }}">
        @csrf
        @method('PUT')
        <div>
            <label> Tag name </label>
            <input type="text" name="tag_name" value="{{$tag['name']}}">
        </div>

        @include('forms.errors')

        <div>
            <input type="submit" name="Edit tag">
        </div>
    </form>
@endsection
