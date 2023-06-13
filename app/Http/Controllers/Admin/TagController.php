<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Support\Str;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTagRequest  $request
     */
    public function store(StoreTagRequest $request)
    {
        $form_data = $request->validated();
        $slug = Str::slug($request->name, '-');
        $form_data['slug'] = $slug;
        $newTag = Tag::create($form_data);
        return redirect()->route('admin.tags.show', ['tag' => $newTag]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     */
    public function show(Tag $tag)
    {
        return view('admin.tags.show', compact('tag'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     */
    public function edit(Tag $tag)
    {
        return view('admin.tags.edit', compact('tag'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTagRequest  $request
     * @param  \App\Models\Tag  $tag
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        $form_data = $request->validated();
        $tag->update($form_data);
        return view('admin.tags.show', compact('tag'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('admin.tags.index');
    }
}