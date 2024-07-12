<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::paginate(5); 
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        $tasks = Task::all();
        return view('projects.create', compact('tasks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'task_id' => 'required',
            'name' => 'required|unique:projects,name|max:255', 
            'deadline' => 'required',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->hashName();
            $image->storeAs('public/projects', $imageName);
        } else {
            $imageName = null;
        }

        Project::create([
            'task_id' => $request->task_id,
            'name' => $request->name,
            'image' => $imageName,
            'deadline' => $request->deadline,
        ]);

        return redirect()->route('projects.index')
                        ->with('success', 'Project created successfully.');
    }

    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        $tasks = Task::all();
        return view('projects.edit', compact('project', 'tasks'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'task_id' => 'required',
            'name' => 'required',
            'deadline' => 'required',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($project->image) {
                Storage::delete('public/projects/' . $project->image);
            }

            $image = $request->file('image');
            $imageName = $image->hashName();
            $image->storeAs('public/projects', $imageName);

            $project->image = $imageName;
        }

        $project->task_id = $request->task_id;
        $project->name = $request->name;
        $project->deadline = $request->deadline;
        $project->save();

        return redirect()->route('projects.index')
                        ->with('success', 'Project updated successfully.');
    }


    public function destroy(Project $project)
    {
        if ($project->image) {
            Storage::delete('public/projects/'.$project->image);
        }

        $project->delete();

        return redirect()->route('projects.index')
                         ->with('success', 'Project deleted successfully.');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $projects = Project::whereHas('task', function($q) use ($query) {
                        $q->where('name', 'LIKE', "%$query%");
                    })
                    ->orWhere('name', 'LIKE', "%$query%")
                    ->orWhere('deadline', 'LIKE', "%$query%")
                    ->paginate(10);

        if ($projects->isEmpty()) {
            return redirect()->route('projects.index')->with('warning', 'Tidak Ada Projects Yang Cocok.');
        }

        return view('projects.index', compact('projects'));
    }
}
