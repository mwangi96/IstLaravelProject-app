<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::where('user_id', auth()->id())->get();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
       $data = $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'required|string|max:500',
            'description' => 'required|string',
            'video_url' => 'nullable|url',
            'visibility' => 'required|in:public,private',
        ]);
        $project = new Project($data);
        $project->user_id = auth()->id();
        $project->save();
            return redirect('/projects')->with('success', 'Project created successfully.');
    }

    public function show($id)
    {
        $project = Project::findOrFail($id);
        return view('projects.show', compact('project'));
    }
    

    public function edit($id)
    {
        $project = Project::findOrFail($id);   
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request,$id)
    {
     $data = $validated = $request->validate([
            'title' => 'required|max:255',
            'summary' => 'required',
            'description' => 'required',
            'video_url' => 'nullable|url',
            'visibility' => 'required|in:public,private',
        ]);

        $project = Project::findOrFail($id);
        $project->update($data);

        return  redirect('/projects')->with('success', 'Project updated successfully');
    }

    public function destroy(Project $project)
    {
        $this->authorize('delete', $project);

        try {
            $project->delete();
            return redirect('/projects')->with('success', 'Project deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Error deleting project: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to delete project.');
        }
    }
}
