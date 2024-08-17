@extends('layouts.app')

@section('content')
<div class="bg-gray-100 py-8">
    @if($profiles->isEmpty())
    <!-- No Profile Found Section -->
    <div class="bg-yellow-100 border border-yellow-300 text-yellow-700 p-6 rounded-lg mx-8">
        <h2 class="font-semibold text-2xl mb-2">No Profile Found</h2>
        <p class="text-gray-700">It looks like you haven't created any profiles yet. Click the button below to create a profile and start showcasing your skills and experience.</p>
        <a href="{{ route('alumni_profiles.create') }}" class="mt-4 inline-block px-6 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600">
            Create Your Profile
        </a>
    </div>
    @endif
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 p-8">
        @foreach($profiles as $profile)
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="p-6">
                <div class="md:flex">
                    <!-- Left Side: Profile Picture and About Me -->
                    <div class="md:w-1/2">
                        <div class="flex items-center mb-4">
                            <img class="w-24 h-24 rounded-full object-cover shadow-sm" src="{{ asset('storage/' . $profile->profile_pic) }}" alt="Profile Picture">
                            <div class="ml-4">
                                <h2 class="text-xl font-bold text-gray-800">{{ $profile->name }}</h2>
                                <p class="text-gray-600">{{ $profile->who_am_i }}</p>
                            </div>
                        </div>

                        <div class="mb-4">
                            <h3 class="text-lg font-semibold text-gray-800">About Me</h3>
                            <p class="text-gray-600">{{ $profile->about_me }}</p>
                        </div>

                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">Personal Details</h3>
                            <ul class="text-gray-600 space-y-2">
                                @if($profile->location)
                                <li class="flex items-center">
                                    <i class="fas fa-map-marker-alt text-red-500 mr-2"></i>{{ $profile->location }}
                                </li>
                                @endif
                                @if($profile->email)
                                <li class="flex items-center">
                                    <i class="fas fa-envelope text-blue-500 mr-2"></i><a href="mailto:{{ $profile->email }}" class="text-blue-600">{{ $profile->email }}</a>
                                </li>
                                @endif
                                @if($profile->phone_number)
                                <li class="flex items-center">
                                    <i class="fas fa-phone text-green-500 mr-2"></i><a href="tel:{{ $profile->phone_number }}" class="text-blue-600">{{ $profile->phone_number }}</a>
                                </li>
                                @endif
                                @if($profile->github_link)
                                <li class="flex items-center">
                                    <i class="fab fa-github text-gray-800 mr-2"></i><a href="{{ $profile->github_link }}" class="text-blue-600">{{ $profile->github_link }}</a>
                                </li>
                                @endif
                                @if($profile->linkedin_link)
                                <li class="flex items-center">
                                    <i class="fab fa-linkedin text-blue-600 mr-2"></i><a href="{{ $profile->linkedin_link }}" class="text-blue-600">{{ $profile->linkedin_link }}</a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>

                    <!-- Right Side: Experience, Education, Skills, Languages, Hobbies -->
                    <div class="md:w-1/2 md:pl-8 mt-6 md:mt-0">
                        <div class="mb-4">
                            <h3 class="text-lg font-semibold text-gray-800">Experience</h3>
                            <p class="text-gray-600">
                                <strong>Company:</strong> {{ $profile->company_name }}<br>
                                <strong>Position:</strong> {{ $profile->position_held }} <span class="text-gray-500">({{ $profile->startWork_year }} - {{ $profile->endWork_year }})</span><br>
                                <strong>Roles:</strong> {{ $profile->roles }}
                            </p>
                        </div>

                        <div class="mb-4">
                            <h3 class="text-lg font-semibold text-gray-800">Education</h3>
                            <p class="text-gray-600">
                                <strong>Institution:</strong> {{ $profile->institution_name }}<br>
                                <strong>Course:</strong> {{ $profile->course_done }} <span class="text-gray-500">({{ $profile->startCourse_year }} - {{ $profile->endCourse_year }})</span>
                            </p>
                        </div>

                        <div class="mb-4">
                            <h3 class="text-lg font-semibold text-gray-800">Skills</h3>
                            <div class="flex flex-wrap">
                                @foreach($profile->skills as $skill)
                                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-lg mr-2 mb-2 shadow-sm">{{ $skill }}</span>
                                @endforeach
                            </div>
                        </div>

                        <div class="mb-4">
                            <h3 class="text-lg font-semibold text-gray-800">Languages</h3>
                            <div class="flex flex-wrap">
                                @foreach($profile->languages as $language)
                                <span class="bg-green-100 text-green-800 px-3 py-1 rounded-lg mr-2 mb-2 shadow-sm">{{ $language }}</span>
                                @endforeach
                            </div>
                        </div>

                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">Hobbies</h3>
                            <div class="flex flex-wrap">
                                @foreach($profile->hobbies as $hobby)
                                <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-lg mr-2 mb-2 shadow-sm">{{ $hobby }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
