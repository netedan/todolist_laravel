<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\Tag;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::with('author')
            ->withCount(['tasks', 'tags'])
            ->get();
        return view('/projects/projects', ['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::all();
        return view('/projects/project_add', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $project = Project::create([
            'name' => $request->input('project_name'),
            'author_id' => $request->input('author_id'),
        ]);
//        $tag = Tag::find($request->input('tag_id'));
        $project->tags()->attach($request->input('tag_id', []));

        return redirect('/projects');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $project->load('author', 'tasks', 'tags');
        return view('/projects/project', ['project' => $project]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $tags = Tag::all();
        return view('/projects/project_edit', compact('project', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $project->name = $request->input('project_name');
        $project->author_id = $request->input('author_id');
        $project->tags()->sync($request->input('tag_id', []));
        $project->save();
        return redirect('/projects');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects');
    }
}
