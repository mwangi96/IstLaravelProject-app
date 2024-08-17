<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Models\ApplicationForJob; 
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Permission;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class JobController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:view-job', only: ['index']),
            new Middleware('permission:create-job', only: ['create', 'store']),
            new Middleware('permission:update-job', only: ['update', 'edit']),
            new Middleware('permission:delete-job', only: ['delete']),
        ];
    }

    // public function index()
    // {
    //     $jobs = Job::all();
    //     return view('jobs.index', compact('jobs'));
    // }
    public function index(Request $request)
    {
        $query = Job::query();
        
        if ($request->has('search')) {
            $query->where('title', 'like', "%{$request->search}%");
        }
    
        $jobs = $query->paginate(10);
        return view('jobs.index', compact('jobs'));
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'qualifications' => 'required|string',
                'location' => 'required|string|max:255',
                'salary' => 'nullable|numeric|min:0',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
    
            $job = new Job();
            $job->title = $request->title;
            $job->description = $request->description;
            $job->qualifications = $request->qualifications;
            $job->location = $request->location;
            $job->salary = $request->salary;
    
            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('images', 'public');
                $job->image = $path;
            }
    
            $job->save();

            return redirect()->route('jobs.index')->with('success', 'Job created successfully.');

        } catch (\Exception $e) {
            Log::error('Failed to create job: ' . $e->getMessage());
            return back()->withErrors('Failed to create job. Please try again.');
        }
    }

    public function show($id)
    {
        $job = Job::findOrFail($id);
        return view('jobs.show', compact('job'));
    }

    public function edit(Job $job)
    {
        return view('jobs.edit', compact('job'));
    }

    public function update(Request $request, Job $job)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'qualifications' => 'required|string',
            'location' => 'required|string|max:255',
            'salary' => 'nullable|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $job->title = $request->title;
        $job->description = $request->description;
        $job->qualifications = $request->qualifications;
        $job->location = $request->location;
        $job->salary = $request->salary;

        if ($request->hasFile('image')) {
            if ($job->image) {
                Storage::disk('public')->delete($job->image);
            }
            $path = $request->file('image')->store('images', 'public');
            $job->image = $path;
        }

        $job->save();

        return redirect()->route('jobs.index')->with('toast_success', 'Job updated successfully.');
    }

    public function destroy(Job $job)
    {
        if ($job->image) {
            Storage::disk('public')->delete($job->image);
        }

        $job->delete();

        return redirect()->route('jobs.index')->with('success', 'Job deleted successfully.');
    }
    public function apply($id)
    {
        // Ensure you are using the correct namespace for the Job model
        $job = Job::findOrFail($id); // Fetch the Job model using the provided ID
    
        return view('jobs.apply', compact('job')); // Pass the Job model to the view
    }

    public function applyStore(Request $request, Job $job)
    {
        \Log::info('Job ID:', ['job_id' => $job->id]);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'resume' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'cover_letter' => 'required|string',
            'skills' => 'nullable|array',
            'skills.*' => 'exists:skills,id',
        ]);

        $resumePath = $request->file('resume')->store('resumes', 'public');

        $application = ApplicationForJob::create([
            'job_id' => $job->id,
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'email' => $request->email,
            'resume' => $resumePath,
            'cover_letter' => $request->cover_letter,
        ]);


        return redirect()->route('jobs.index')->with('success', 'Application submitted successfully!');
    }

    public function applications()
    {
        $applications = ApplicationForJob::with('job')->get();
        return view('jobs.applications', compact('applications'));
    }

    public function review($applicationId)
    {
        $application = ApplicationForJob::findOrFail($applicationId);
        $application->status = 'reviewed';
        $application->save();
    
        return redirect('/applications')->with('status', 'Application reviewed and email sent.');
    }
    
    public function approve($applicationId)
    {
        $application = ApplicationForJob::findOrFail($applicationId);

        $application->status = 'approved';
        $application->save();

        if ($application->user) {
            $application->user->notify(new ApplicationApproved($application));
        } else {
            return redirect('/applications')->with('error', 'User not found for this application.');
        }

        return redirect('/applications')->with('status', 'Application approved and user notified.');
    }

    public function deny($applicationId)
    {
        $application = ApplicationForJob::findOrFail($applicationId);

        $application->status = 'denied';
        $application->save();

        if ($application->user) {
            $application->user->notify(new ApplicationDenied($application));
        } else {
            return redirect('/applications')->with('error', 'User not found for this application.');
        }

        return redirect('/applications')->with('status', 'Application denied and user notified.');
    }
}