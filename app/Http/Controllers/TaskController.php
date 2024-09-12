<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use App\Repositories\TaskRepository;
use DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\Console\Input\Input;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();
        return view('tasks', ['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('task_add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        Log::debug('string1');
        $task = Task::create([
            'name' => $request->input('task_name'),
            'status' => $request->input('task_status'),
            'author_id' => $request->input('author_id'),
            'executor_id' => $request->input('executor_id')
        ]);

        return redirect('tasks');

}

    /**
     * Display the specified resource.
     */
    public
    function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public
    function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public
    function update(UpdateTaskRequest $request, Task $task)
    {
        TaskController::update($request, $task);
        return redirect('/tasks');
    }

    /**
     * Remove the specified resource from storage.
     */
    public
    function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks');

    }
}
