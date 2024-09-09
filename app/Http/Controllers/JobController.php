<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ApplicationsForJobs;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Permission;
// use App\Notifications\JobPostedNotification;
use Illuminate\Support\Facades\Notification;
use App\Notifications\JobAppliedNotification;
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

    public function index()
    {
        $jobs = Job::all();
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

        return redirect()->route('jobs.show', $job->id)->with('success', 'Job updated successfully.');
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
        $job = Job::findOrFail($id);
        return view('jobs.apply', compact('job'));
    }

    public function applyStore(Request $request, Job $job)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'resume' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'cover_letter' => 'required|string',
        ]);

        $resumePath = $request->file('resume')->store('resumes', 'public');

        $application = ApplicationsForJobs::create([
            'job_id' => $job->id,
            'user_id' => Auth::id(),
            'name' => $request->name,
            'email' => $request->email,
            'resume' => $resumePath,
            'cover_letter' => $request->cover_letter,
        ]);

        // if ($job->user) {
        //     $job->user->notify(new JobAppliedNotification($application));
        // }

            // Get all admin users (assuming 'admin' is the role for administrators)
            $admins = User::role('admin')->get();

            // Send notification to all admins
            Notification::send($admins, new JobAppliedNotification($application));

        return redirect()->route('applications.index')->with('success', 'Application submitted successfully!');
    }
}
