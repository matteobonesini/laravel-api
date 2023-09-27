<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Project\StoreProjectRequest;
use App\Http\Requests\Project\UpdateProjectRequest;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();

        return view('admin.projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $data = $request->validated();

        $imgPath = null;
        if (isset($data['img_src'])) {
            $imgPath = Storage::put('/', $data['img_src']);
        }

        $newProject = Project::create([
            'title' => $data['title'],
            'img_src' => $imgPath,
            'description' => $data['description'],
            'type_id' => $data['type_id'],
        ]);

        if (isset($data['technologies'])) {
            foreach ($data['technologies'] as $technologyId) {
                $newProject->technologies()->attach($technologyId);
            }
        }

        return redirect()->route('projects.show', ['project' => $newProject->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $technologies = Technology::all();

        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();

        $imgPath = $project->img_src;
        if (isset($data['img_src'])) {
            if ($project->img_src) {
                Storage::delete($project->img_src);
            }
            $imgPath = Storage::put('/', $data['img_src']);
        }
        else if (isset($data['remove_img_src'])) {
            if ($project->img_src) {
                Storage::delete($project->img_src);
            }
            $imgPath = null;
        }

        $updatedProject = Project::findOrFail($project->id); 
        $updatedProject->update([
            'title' => $data['title'],
            'img_src' => $imgPath,
            'description' => $data['description'],
            'type_id' => $data['type_id'],
        ]);

        if (isset($data['technologies'])) {
            $updatedProject->technologies()->sync($data['technologies']);
        }
        else {
            $updatedProject->technologies()->detach();
        }

        return redirect()->route('projects.show', ['project' => $updatedProject->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if ($project->img_src) {
            Storage::delete($project->img_src);
        }
        Project::findOrFail($project->id)->delete();
        return redirect()->route('projects.index');
    }
}
