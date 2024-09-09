<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Application;
use Illuminate\Http\Request;
use App\Models\ApplicationsForJobs;
use App\Notifications\ApplicationDeniedNotification;
use App\Notifications\ApplicationApprovedNotification;
use App\Notifications\ApplicationUnderReviewNotification;

class ApplicationController extends Controller
{
    // Display a listing of the applications
    public function index()
    {
        $applications = ApplicationsForJobs::with('job')->get(); // Eager load the Job model to reduce queries
        return view('applications.index', compact('applications')); // Ensure the correct view path
    }

    // Review a specific application
    public function review($id)
    {
        $application = ApplicationsForJobs::findOrFail($id);
        $job = Job::findOrFail($application->job_id);
    
        // Mark the application as reviewed
        $application->status = 'reviewed';
        $application->save();
    
        // }
        $alumniProfile = $application->alumniProfile; // Access the alumni profile using the defined relationship
        if ($alumniProfile) {
            $alumniProfile->user->notify(new ApplicationUnderReviewNotification($job));
        }
    
        return redirect()->route('applications.index')->with('success', 'Application reviewed and notification sent!');
    }
    
    public function approve($id)
    {
        $application = ApplicationsForJobs::findOrFail($id);
        $job = Job::findOrFail($application->job_id);
    
        // Mark the application as approved
        $application->status = 'approved';
        $application->save();

    
        // }
        $alumniProfile = $application->alumniProfile;
        if ($alumniProfile) {
            $alumniProfile->user->notify(new ApplicationApprovedNotification($job));
        }
    
        return redirect()->route('applications.index')->with('success', 'Application approved and notification sent!');
    }
    
    public function deny($id)
    {
        $application = ApplicationsForJobs::findOrFail($id);
        $job = Job::findOrFail($application->job_id);
    
        // Mark the application as denied
        $application->status = 'denied';
        $application->save();
    
        // Notify the alumni profile
        // if ($profiles) {
        //     \Log::info('Sending email to: ' . $profiles->user->email);
        //     $profiles->user->notify(new ApplicationDeniedNotification($job));
        // }
        $alumniProfile = $application->alumniProfile;
        if ($alumniProfile) {
            $alumniProfile->user->notify(new ApplicationDeniedNotification($job));
        }
    
        return redirect()->route('applications.index')->with('success', 'Application denied and notification sent!');
    }

    public function showNotifications()
    {
        $notifications = auth()->user()->notifications;

        return view('notifications.index', compact('notifications'));
    }
}    