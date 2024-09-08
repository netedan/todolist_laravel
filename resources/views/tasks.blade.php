@foreach($tasks as $task)
    <a href="/tasks/{{ $task['id'] }}">{{ $task['id'] }}</a>
    <br>{{ $task['name'] }}


@endforeach
