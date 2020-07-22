<?php

namespace App\Http\Controllers;
use App\Project;
use DatabaseSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class ProjectController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $projects = Project::get();
        return view('project_list', compact('projects'));
    }
    public function show(Project $project)
    {

        return view('task_list', compact('project'));
    }

    public function edit(Project $project)
    {
        return view('projects.form', compact('project'));
    }

    public function create()
    {
        return view('projects.form');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('project_list');
    }
    public function update(Request $request, Project $project)
    {
        $params = $request->all();
        $project->update($params);
        return redirect()->route('projects.index');
    }
    public function store(Request $request)
    {
        Project::create($request->all());
        return redirect()->route('projects.index');
    }
    public function generate()
    {
        $seed = new DatabaseSeeder;
        $seed->run();
        return redirect()->route('project_list');
    }

}
