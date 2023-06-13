<?php

namespace App\Http\Controllers\Admin;

use App\Models\Type;
use App\Models\Project;
use Illuminate\Support\Str;
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;
use App\Http\Controllers\Controller;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $types = Type::all();
        return view('admin.types.index', compact('types'));

    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('admin.types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTypeRequest  $request
     */
    public function store(StoreTypeRequest $request)
    {
        $form_data = $request->validated();
        $slug = Str::slug($request->tech, '-');
        $form_data['slug'] = $slug;
        $newType = Type::create($form_data);
        return redirect()->route('admin.types.index', ['type' => $newType]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     */
    public function show(Type $type)
    {

        return view('admin.types.show', compact('type'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     */
    public function edit(Type $type)
    {
        return view('admin.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTypeRequest  $request
     * @param  \App\Models\Type  $type
     */
    public function update(UpdateTypeRequest $request, Type $type)
    {
        $form_data = $request->validated();
        $type->update($form_data);
        return view('admin.types.show', compact('type'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     */
    public function destroy(Type $type)
    {
        $type->delete();
        return redirect()->route('admin.types.index');
    }
}