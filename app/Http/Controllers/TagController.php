<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Models\Project;
use App\Models\Tag;
use App\Models\Task;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Tag::withCount('projects', 'tasks');

        if ($request->filled('name')) {
            $query->where('name', 'like', "%{$request->get('name')}%");
        }

        if ($request->filled('tag_id')) {
            $query->where('id', $request->get('tag_id'));
        }

        $sort = $request->get('sort', 'id');
        $order = $request->get('order', 'asc');

        if (!in_array($sort, ['id', 'name'])) {
            $sort = 'id';
        }

        $tags = $query->orderBy($sort, $order)->get();

        return view('tags.tags', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tasks = Task::all();
        $projects = Project::all();
        return view('/tags/tag_add', compact('projects', 'tasks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTagRequest $request)
    {
        $tag = Tag::create([
            'name' => $request->input('name'),
        ]);
        $tag->projects()->attach($request->input('project_id'));
        $tag->tasks()->attach($request->input('task_id'));

        return redirect('/tags');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        $tag->load('projects', 'tasks');
        return view('/tags/tag', ['tag' => $tag]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        $projects = Project::all();
        $tasks = Task::all();
        return view('/tags/tag_edit', compact( 'tag','projects', 'tasks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        $tag->name = $request->input('tag_name');
        $tag->projects()->sync($request->input('project_id', []));
        $tag->tasks()->sync($request->input('task_id', []));
        $tag->save();

        return redirect('/tags');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tags');
    }
}
