<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Type;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Support\Facades\Auth;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        $projects = Project::paginate(6);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        $types = Type::all();
        $tags = Tag::all();
        return view('admin.projects.create', compact('types', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     *
     */
    public function store(StoreProjectRequest $request)
    {
        $form_data = $request->validated();
        $slug = Str::slug($request->title, '-');
        $form_data['slug'] = $slug;
        $newProject = Project::create($form_data);
        if ($request->has('tags')) {
            $newProject->tags()->attach($request->tags);
        }
        ;
        return redirect()->route('admin.projects.show', $newProject->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     *
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     *
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $tags = Tag::all();
        return view('admin.projects.edit', compact('project', 'types', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest
     * @param  \App\Models\Project  $project
     *
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $form_data = $request->validated();
        $slug = Str::slug($request->title, '-');
        $form_data['slug'] = $slug;
        $project->update($form_data);
        if ($request->has('tags')) {
            $project->tags()->sync($request->tags);
        } else {
            $project->tags()->sync([]);
        }
        return redirect()->route('admin.projects.show', $project->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     *
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index');
    }
}