<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sort = $request->get('sort', 'id');
        $order = $request->get('order', 'asc');

        if (!in_array($sort, ['id', 'name'])) {
            $sort = 'id';
        }

        $tags = Tag::orderBy($sort, $order)->get();

        return view('/tags/tags', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('/tags/tag_add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTagRequest $request)
    {
        $tag = Tag::create([
            'name' => $request->input('tag_name')
        ]);
        return redirect('/tags');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        return view('/tags/tag', ['tag' => $tag]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return view('/tags/tag_edit', ['tag' => $tag]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        $tag->name = $request->input('tag_name');
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
