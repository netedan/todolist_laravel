<form method="POST" action="{{ route('task_update', ['task' => $task->id]) }}">
    @csrf
    @method('PUT')
    <div>
        <label> Task name </label>
        <input type="text" name="task_name" value="{{$task->name}}">
    </div>
    <div>
        <label> Task status</label>
        <input type="text" name="task_status" value="{{$task->status}}">
    </div>
    <div>
        <label> Author ID</label>
        <input type="number" name="author_id" value="{{$task->author_id}}">
    </div>
    <div>
        <label> Executor ID</label>
        <input type="number" name="executor_id" value="{{$task->executor_id}}">
    </div>
    <div>
        <label> Project ID</label>
        <input type="number" name="project_id" value="{{$task->project_id}}">
    </div>
    <div>
        <input type="submit" name="Edit task">
    </div>
</form>

