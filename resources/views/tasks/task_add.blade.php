<form method="POST" action="http://localhost/tasks">
    @csrf
    <div class="add_page">
        <div>
            <label> Task name </label>
            <input type="text" name="task_name">
        </div>
        <div>
            <label> Task status </label>
            <input type="text" name="task_status">
        </div>
        <div>
            <label> Task author ID </label>
            <input type="number" name="author_id">
        </div>
        <div>
            <label> Task executor ID </label>
            <input type="number" name="executor_id">
        </div>
        <div id="add">
            <label> Add task </label>
            <input type="submit" name="Add task">
        </div>
    </div>
</form>

