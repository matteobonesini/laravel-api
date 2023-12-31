<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::paginate(6);

        return response()->json([
            'success' => true,
            'result' => $projects
        ]); 
    }

    public function show(string $slug) {

        $project = Project::where('slug', $slug)->with('type', 'technologies')->first();

        if ($project) {
            return response()->json([
                'success' => true,
                'results' => $project
            ], 200);
        }
        else {
            return response()->json([
                'success' => false,
                'message' => 'Not found'
            ], 404);
        }

    }
}
