<?php

namespace App\Http\Controllers;

use App\Project;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($project_id)
    {
        $tasks = Task::get()->where('project_id',$project_id);
        return view('task_list', compact('tasks','project_id'));
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task, Project $project)
    {
        $projects = Project::get();
        return view('tasks.form', compact('task','projects'));
    }
    public function create(Project $project)
    {
        $projects = Project::get();
        //dd($project);
        return view('tasks.form', compact('projects'));
    }

    public function store(Request $request)
    {
        if ($request->file('file')){
            $path = $request->file('file')->store('task');
            $params['file'] = $path;
        }
        $params = $request->all();
        Task::create($params);
        return redirect()->route('project_list');
    }

    public function update(Request $request, Task $task)
    {
        $task->file = null;
        $path = $request->file('file')->store('task');
        $params = $request->all();
        $params['file'] = $path;
        $task->update($params);
        return redirect()->route('project_list');
    }

    public function destroy(Task $task)
    {
        //dd($task);
        $task->delete();
        return redirect()->route('project_list');
    }
    public function download($task)
    {
        $tasks = Task::get()->where('id',$task);
        foreach ($tasks as $task){
            $pathToFile=storage_path()."/app/public/".$task->file;
        }
        return response()->download($pathToFile);
    }
    }
