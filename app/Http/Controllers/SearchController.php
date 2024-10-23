<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;
use App\Models\Tag;
use App\Models\Project;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('q');

        $users = User::where('name', 'like', "%{$query}%")
            ->orWhere('surname', 'like', "%{$query}%")
            ->orWhere('patronymic', 'like', "%{$query}%")
            ->get();

        $projects = Project::where('name', 'like', "%{$query}%")
            ->orWhere('author_id', 'like', "%{$query}%")
            ->get();

        $tasks = Task::where('name', 'like', "%{$query}%")
            ->orWhere('status', 'like', "%{$query}%")
            ->orWhere('author_id', 'like', "%{$query}%")
            ->orWhere('executor_id', 'like', "%{$query}%")
            ->get();

        $tags = Tag::where('name', 'like', "%{$query}%")
            ->get();

        return view('search_results', compact('users', 'projects', 'tags', 'tasks', 'query'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
