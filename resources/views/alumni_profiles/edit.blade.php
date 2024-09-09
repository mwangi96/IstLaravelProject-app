@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-2xl font-semibold mb-6">Edit Alumni Profile</h2>

            <form action="{{ route('alumni_profiles.update', $profiles->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Profile Picture -->
                <div class="mb-4">
                    <label for="profile_pic" class="block text-sm font-medium text-gray-700">Profile Picture</label>
                    <input type="file" name="profile_pic" id="profile_pic" class="mt-1 block w-full" />
                    @if ($profiles->profile_pic)
                        <img src="{{ asset('storage/' . $profiles->profile_pic) }}" alt="Profile Picture" class="mt-2 w-24 h-24 object-cover rounded-full">
                    @endif
                    @error('profile_pic')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                </div>

                <!-- Name -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="name" class="mt-1 block w-full" value="{{ old('name', $profiles->name) }}" />
                    @error('name')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                </div>

                <!-- Who Am I -->
                <div class="mb-4">
                    <label for="who_am_i" class="block text-sm font-medium text-gray-700">Who Am I</label>
                    <textarea name="who_am_i" id="who_am_i" class="mt-1 block w-full">{{ old('who_am_i', $profiles->who_am_i) }}</textarea>
                    @error('who_am_i')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                </div>

                <!-- About Me -->
                <div class="mb-4">
                    <label for="about_me" class="block text-sm font-medium text-gray-700">About Me</label>
                    <textarea name="about_me" id="about_me" class="mt-1 block w-full">{{ old('about_me', $profiles->about_me) }}</textarea>
                    @error('about_me')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                </div>

                <!-- Location -->
                <div class="mb-4">
                    <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                    <input type="text" name="location" id="location" class="mt-1 block w-full" value="{{ old('location', $profiles->location) }}" />
                    @error('location')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" class="mt-1 block w-full" value="{{ old('email', $profiles->email) }}" />
                    @error('email')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                </div>

                <!-- Phone Number -->
                <div class="mb-4">
                    <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone Number</label>
                    <input type="text" name="phone_number" id="phone_number" class="mt-1 block w-full" value="{{ old('phone_number', $profiles->phone_number) }}" />
                    @error('phone_number')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                </div>

                <!-- GitHub Link -->
                <div class="mb-4">
                    <label for="github_link" class="block text-sm font-medium text-gray-700">GitHub Link</label>
                    <input type="url" name="github_link" id="github_link" class="mt-1 block w-full" value="{{ old('github_link', $profiles->github_link) }}" />
                    @error('github_link')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                </div>

                <!-- LinkedIn Link -->
                <div class="mb-4">
                    <label for="linkedin_link" class="block text-sm font-medium text-gray-700">LinkedIn Link</label>
                    <input type="url" name="linkedin_link" id="linkedin_link" class="mt-1 block w-full" value="{{ old('linkedin_link', $profiles->linkedin_link) }}" />
                    @error('linkedin_link')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                </div>

                <!-- Company Name -->
                <div class="mb-4">
                    <label for="company_name" class="block text-sm font-medium text-gray-700">Company Name</label>
                    <input type="text" name="company_name" id="company_name" class="mt-1 block w-full" value="{{ old('company_name', $profiles->company_name) }}" />
                    @error('company_name')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                </div>

                <!-- Position Held -->
                <div class="mb-4">
                    <label for="position_held" class="block text-sm font-medium text-gray-700">Position Held</label>
                    <input type="text" name="position_held" id="position_held" class="mt-1 block w-full" value="{{ old('position_held', $profiles->position_held) }}" />
                    @error('position_held')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                </div>

                <!-- Start Work Year -->
                <div class="mb-4">
                    <label for="startWork_year" class="block text-sm font-medium text-gray-700">Start Work Year</label>
                    <input type="text" name="startWork_year" id="startWork_year" class="mt-1 block w-full" value="{{ old('startWork_year', $profiles->startWork_year) }}" />
                    @error('startWork_year')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                </div>

                <!-- End Work Year -->
                <div class="mb-4">
                    <label for="endWork_year" class="block text-sm font-medium text-gray-700">End Work Year</label>
                    <input type="text" name="endWork_year" id="endWork_year" class="mt-1 block w-full" value="{{ old('endWork_year', $profiles->endWork_year) }}" />
                    @error('endWork_year')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                </div>

                <!-- Roles -->
                <div class="mb-4">
                    <label for="roles" class="block text-sm font-medium text-gray-700">Roles</label>
                    <textarea name="roles" id="roles" class="mt-1 block w-full">{{ old('roles', $profiles->roles) }}</textarea>
                    @error('roles')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                </div>

                <!-- Institution Name -->
                <div class="mb-4">
                    <label for="institution_name" class="block text-sm font-medium text-gray-700">Institution Name</label>
                    <input type="text" name="institution_name" id="institution_name" class="mt-1 block w-full" value="{{ old('institution_name', $profiles->institution_name) }}" />
                    @error('institution_name')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                </div>

                <!-- Course Done -->
                <div class="mb-4">
                    <label for="course_done" class="block text-sm font-medium text-gray-700">Course Done</label>
                    <input type="text" name="course_done" id="course_done" class="mt-1 block w-full" value="{{ old('course_done', $profiles->course_done) }}" />
                    @error('course_done')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                </div>

                <!-- Start Course Year -->
                <div class="mb-4">
                    <label for="startCourse_year" class="block text-sm font-medium text-gray-700">Start Course Year</label>
                    <input type="text" name="startCourse_year" id="startCourse_year" class="mt-1 block w-full" value="{{ old('startCourse_year', $profiles->startCourse_year) }}" />
                    @error('startCourse_year')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                </div>

                <!-- End Course Year -->
                <div class="mb-4">
                    <label for="endCourse_year" class="block text-sm font-medium text-gray-700">End Course Year</label>
                    <input type="text" name="endCourse_year" id="endCourse_year" class="mt-1 block w-full" value="{{ old('endCourse_year', $profiles->endCourse_year) }}" />
                    @error('endCourse_year')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                </div>

            <!-- Skills -->
            <div class="mb-4">
                <label for="skills" class="block text-sm font-medium text-gray-700">Skills</label>
                <textarea name="skills" id="skills" class="mt-1 block w-full">{{ old('skills', isset($profiles->skills) ? implode(', ', $profiles->skills) : '') }}</textarea>
                @error('skills')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>

            <!-- Languages -->
            <div class="mb-4">
                <label for="languages" class="block text-sm font-medium text-gray-700">Languages</label>
                <textarea name="languages" id="languages" class="mt-1 block w-full">{{ old('languages', isset($profiles->languages) ? implode(', ', $profiles->languages) : '') }}</textarea>
                @error('languages')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>

            <!-- Hobbies -->
            <div class="mb-4">
                <label for="hobbies" class="block text-sm font-medium text-gray-700">Hobbies</label>
                <textarea name="hobbies" id="hobbies" class="mt-1 block w-full">{{ old('hobbies', isset($profiles->hobbies) ? implode(', ', $profiles->hobbies) : '') }}</textarea>
                @error('hobbies')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>

                <!-- Submit Button -->
                <div class="mt-8">
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Update Profile</button>
                </div>
            </form>
        </div>
    </div>
 @endsection
