<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Tag;
use App\Models\Task;
use App\Repositories\TaskRepository;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\Console\Input\Input;
use Carbon\Carbon;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Task::withCount('tags')->with('project', 'author', 'executor');

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->get('name') . '%');
        }

        if($request->filled('status')) {
            $query->where('status', $request->get('status'));
        }

        if($request->filled('author_id')) {
            $query->where('author_id', $request->get('author_id'));
        }

        if($request->filled('executor_id')) {
            $query->where('executor_id',$request->get('executor_id'));
        }

        if($request->filled('task_id')) {
            $query->where('id', $request->get('task_id'));
        }

        $sort = $request->get('sort', 'id');
        $order = $request->get('order', 'asc');

        if (!in_array($order, ['asc', 'desc'])) {
            $sort = 'id';
        }

        $tasks = $query->orderBy($sort, $order)->get();

        return view('tasks.tasks', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::all();
        return view('/tasks/task_add', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        $task = Task::create([
            'name' => $request->input('task_name'),
            'status' => $request->input('task_status'),
            'author_id' => $request->input('author_id'),
            'executor_id' => $request->input('executor_id'),
            'project_id' => $request->input('project_id'),
            'due_date' => Carbon::createFromFormat('Y-m-d\TH:i', $request->input('due_date')),
        ]);

        $task->tags()->attach($request->input('tag_id', []));
        return redirect('tasks');
    }

    public function checkDeadlines()
    {
        $tasks = Task::all();
        foreach ($tasks as $task) {
            $task->archiveIfOverdue();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        $task->load('project', 'tags');
        return view('/tasks/task', ['task' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $tags = Tag::all();
        return view('/tasks/task_edit', compact('task', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task->name = $request->input('task_name');
        $task->status = $request->input('status');
        $task->author_id = $request->input('author_id');
        $task->executor_id = $request->input('executor_id');
        $task->due_date = $request->input('due_date');
        $task->project_id = $request->input('project_id');
        $task->tags()->sync($request->input('tag_id', []));
        $task->save();
        return redirect('tasks');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks');
    }
}
