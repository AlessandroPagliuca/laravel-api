<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('type')->paginate(5);
        return response()->json([
            'status' => 'success',
            'message' => 'ok',
            'results' => $projects
        ], 200);
    }

    public function show($slug)
    {
        $project = Project::with('type', 'tags')->where('slug', $slug)->first();

        if ($project) {
            return response()->json([
                'status' => 'success',
                'message' => 'ok',
                'results' => $project
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Project not found !'
            ], 404);
        }


    }
}