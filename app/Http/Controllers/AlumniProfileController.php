<?php

namespace App\Http\Controllers;

use App\Models\AlumniProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlumniProfileController extends Controller
{
    public function index()
    {
        $profiles = AlumniProfile::all();
        return view('alumni_profiles.index', compact('profiles'));
    }

    public function create()
    {
        return view('alumni_profiles.create');
    }

    public function show($id)
    {
        $profiles = AlumniProfile::findOrFail($id);
        return view('profiles.show', compact('profiles'));
    }

    public function edit($id)
{
    // Find the alumni profile by ID
    $profiles = AlumniProfile::findOrFail($id);

    // Return the edit view with the profile data
    return view('alumni_profiles.edit', compact('profiles'));
}


    public function store(Request $request)
{
    $request->validate([
        'profile_pic' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Profile picture must be an image of certain formats and size
        'name' => 'required|string|max:255', // Name is required, must be a string, and cannot exceed 255 characters
        'who_am_i' => 'nullable|string|max:500', // 'Who am I' section can be null, but if provided, must be a string with a max of 500 characters
        'about_me' => 'nullable|string|max:1000', // 'About Me' section can be null, but if provided, must be a string with a max of 1000 characters
        'location' => 'nullable|string|max:255', // Location can be null, but if provided, must be a string with a max of 255 characters
        'email' => 'required|email|unique:alumni_profiles,email|max:255', // Email is required, must be unique, valid format, and max 255 characters
        'phone_number' => 'nullable|string|max:20', // Phone number can be null, must be a string, and max 20 characters
        'github_link' => 'nullable|url|max:255', // GitHub link can be null, but if provided, must be a valid URL and max 255 characters
        'linkedin_link' => 'nullable|url|max:255', // LinkedIn link can be null, but if provided, must be a valid URL and max 255 characters

        // Experience-related fields
        'company_name' => 'nullable|string|max:255', // Company name can be null, but if provided, must be a string with a max of 255 characters
        'position_held' => 'nullable|string|max:255', // Position held can be null, but if provided, must be a string with a max of 255 characters
        'startWork_year' => 'nullable|string|max:4', // Start work year can be null, but if provided, must be a string with a max of 4 characters
        'endWork_year' => 'nullable|string|max:4', // End work year can be null, but if provided, must be a string with a max of 4 characters
        'roles' => 'nullable|string|max:1000', // Roles can be null, but if provided, must be a string with a max of 1000 characters

        // Education-related fields
        'institution_name' => 'nullable|string|max:255', // Institution name can be null, but if provided, must be a string with a max of 255 characters
        'course_done' => 'nullable|string|max:255', // Course done can be null, but if provided, must be a string with a max of 255 characters
        'startCourse_year' => 'nullable|string|max:4', // Start course year can be null, but if provided, must be a string with a max of 4 characters
        'endCourse_year' => 'nullable|string|max:4', // End course year can be null, but if provided, must be a string with a max of 4 characters

        // Skills, languages, hobbies must be arrays
        'skills' => 'nullable|array',
        'languages' => 'nullable|array',
        'hobbies' => 'nullable|array',
    ]);

     // Process the validated data
     $data = $request->all();

     // Assign the authenticated user's ID to the user_id field
     $data['user_id'] = auth()->id();


      // Convert comma-separated strings to arrays
    $data['skills'] = $request->input('skills') ? explode(',', $request->input('skills')) : [];
    $data['languages'] = $request->input('languages') ? explode(',', $request->input('languages')) : [];
    $data['hobbies'] = $request->input('hobbies') ? explode(',', $request->input('hobbies')) : [];
 

    if ($request->hasFile('profile_pic')) {
        $path = $request->file('profile_pic')->store('profile_pictures', 'public');
        $data['profile_pic'] = $path;
    }

    AlumniProfile::create($data);



    // return redirect()->route('alumni_profiles.index')->with('success', 'Profile created successfully.');
    return  redirect('/alumni_profiles')->with('success', 'Profile created successfully.');
}

public function update(Request $request, AlumniProfile $alumniProfile)
{
    $request->validate([
        'profile_pic' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'name' => 'required|string|max:255',
        'who_am_i' => 'nullable|string|max:500',
        'about_me' => 'nullable|string|max:1000',
        'location' => 'nullable|string|max:255',
        'email' => 'required|email|unique:alumni_profiles,email,' . $alumniProfile->id,
        'phone_number' => 'nullable|string|max:20',
        'github_link' => 'nullable|url|max:255',
        'linkedin_link' => 'nullable|url|max:255',

        'company_name' => 'nullable|string|max:255',
        'position_held' => 'nullable|string|max:255',
        'startWork_year' => 'nullable|string|max:4',
        'endWork_year' => 'nullable|string|max:4',
        'roles' => 'nullable|string|max:1000',

        'institution_name' => 'nullable|string|max:255',
        'course_done' => 'nullable|string|max:255',
        'startCourse_year' => 'nullable|string|max:4',
        'endCourse_year' => 'nullable|string|max:4',

        'skills' => 'nullable|array',
        'languages' => 'nullable|array',
        'hobbies' => 'nullable|array',
    ]);

    // Update logic
    $data = $request->all();


    // Convert comma-separated strings to arrays
    $data['skills'] = $request->input('skills') ? explode(',', $request->input('skills')) : [];
    $data['languages'] = $request->input('languages') ? explode(',', $request->input('languages')) : [];
    $data['hobbies'] = $request->input('hobbies') ? explode(',', $request->input('hobbies')) : [];

    if ($request->hasFile('profile_pic')) {
        if ($alumniProfile->profile_pic && Storage::disk('public')->exists($alumniProfile->profile_pic)) {
            Storage::disk('public')->delete($alumniProfile->profile_pic);
        }
        $path = $request->file('profile_pic')->store('profile_pictures', 'public');
        $data['profile_pic'] = $path;
    }

    $alumniProfile->update($data);

    return redirect()->route('alumni_profiles.index')->with('success', 'Profile updated successfully.');
}

    public function showNotifications()
    {
        $notifications = auth()->user()->notifications;

        return view('notifications.index', compact('notifications'));
    }
}