@extends('layout')

@section('content')

    <form method="POST" action="{{ route('tasks_store') }}">
        @csrf
        <div class="add_page">
            <div>
                <label>Task name</label>
                <input type="text" name="task_name" required>
            </div>
            <div>
                <label>Task status</label>
                <select name="task_status" required>
                    <option value="Backlog">Backlog</option>
                    <option value="In process">In process</option>
                    <option value="Done">Done</option>
                    <option value="Archive">Archive</option>
                </select>
            </div>
            <div>
                <label>Task author ID</label>
                <input type="number" name="author_id" required>
            </div>
            <div>
                <label>Task executor ID</label>
                <input type="number" name="executor_id" required>
            </div>
            <div>
                <label>Due date</label>
                <input type="datetime-local" name="due_date" required>
            </div>
            <div id="add">
                <input type="submit" value="Добавить задачу">
            </div>
        </div>
    </form>

@endsection
