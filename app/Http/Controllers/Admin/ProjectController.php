<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projectList = Project::paginate(10);
        return view('admin.projects.index', compact('projectList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        return view('admin.projects.create',compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $newProject = new Project();
        
        $data = $request->validated();
        if($request->hasFile('image')){
            $image_path = Storage::put('image', $request->image);
            $newProject->image_path = $image_path;
        } 

        $data['slug'] = Str::slug($data['title']);
        $newProject->fill($data);
        $newProject->save();
        return redirect()->route('admin.projects.index');
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
        return view('admin.projects.edit', compact('project','types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();
        // dd($request->validated());
        
        if($request->hasFile('image')){
            $image_path = Storage::put('image', $request->image);
            $project->image_path = $image_path;    
        } 
        $data['slug'] = Str::slug($data['title']);
        $project->update($data);
        return redirect()->route('admin.projects.show', ['project' => $project->slug])->with('message', 'Project ' . $project->title . ' è stato modificato');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('message', 'Project ' . $project->title . ' è stato eliminato');
    }
}
