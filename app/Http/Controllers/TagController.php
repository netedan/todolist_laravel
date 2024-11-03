<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Models\Project;
use App\Models\Tag;
use App\Models\Task;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::withCount('projects', 'tasks')->get();
        return view('/tags/tags', ['tags' => $tags]);
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
