@extends('layouts.app')

@section('content')
    <!-- Notification Section -->
    @if (session('job_posted'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
            <strong class="font-bold">New Job Posted!</strong>
            <span class="block sm:inline">{{ session('job_posted') }}</span>
        </div>
    @endif

    <!-- Jobs Section -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-6">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="flex flex-col md:flex-row justify-between items-center mb-6">
                    <h1 class="text-2xl font-semibold mb-4 md:mb-0">Jobs</h1>

                    <!-- Search Form -->
                    <form action="{{ route('jobs.index') }}" method="GET" class="mb-4 md:mb-0 flex flex-col md:flex-row items-center space-y-2 md:space-y-0 md:space-x-2">
                        <input type="text" name="search" value="{{ request()->query('search') }}" placeholder="Search jobs" class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 w-full md:w-auto">
                        
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded transition duration-300 w-full md:w-auto">
                            Search
                        </button>
                        @if(auth()->user() && (auth()->user()->hasRole('super-admin') || auth()->user()->hasRole('admin')))
                            <!-- Post Job Button (only visible to super-admin and admin) -->
                            <a href="{{ route('jobs.create') }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded transition duration-300 w-full md:w-auto text-center">
                                Post Job
                            </a>
                        @endif
                    </form>
                </div>

                <!-- Job Listings -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($jobs as $job)
                        <div class="flex flex-col bg-white border border-gray-300 rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow duration-300">
                            @if ($job->image)
                                <div class="w-full">
                                    <img src="{{ asset('storage/' . $job->image) }}" alt="{{ $job->title }}" class="w-full h-48 object-cover rounded-lg transition-transform duration-300 hover:scale-105">
                                </div>
                            @endif
                            <div class="mt-4 flex flex-col justify-between h-full">
                                <div class="space-y-2">
                                    <h2 class="text-xl font-semibold mb-2 uppercase">{{ $job->title }}</h2>
                                    <p class="text-gray-700 flex items-center mb-2">
                                        <i class="fas fa-map-marker-alt mr-2"></i>{{ $job->location }}
                                    </p>
                                    <p class="text-gray-700 flex items-center">
                                        <i class="fas fa-dollar-sign mr-2"></i>{{ $job->salary }}
                                    </p>

                                    <!-- Conditional Display for Admin and Super-Admin -->
                                    @if(auth()->user() && (auth()->user()->hasRole('super-admin') || auth()->user()->hasRole('admin')))
                                        <div class="hidden md:block">
                                            <p class="text-gray-700">{{ Str::limit($job->description, 100) }}</p>
                                        </div>
                                    @endif

                                    <!-- Full Display for Alumni -->
                                    @if(auth()->user() && auth()->user()->hasRole('alumni'))
                                        <div class="block">
                                            <h2 class="text-xl font-semibold text-blue-600">Job Description</h2>
                                            <ul class="list-disc list-inside text-gray-700 mb-2">
                                                @foreach(explode("\n", $job->description) as $description)
                                                    @if(trim($description) !== '')
                                                        <li>{{ $description }}</li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                            <div>
                                                <h2 class="text-xl font-semibold text-blue-600">Job Qualifications</h2>
                                                <ul class="list-disc list-inside text-gray-700 mb-2">
                                                    @foreach(explode("\n", $job->qualifications) as $qualification)
                                                        @if(trim($qualification) !== '')
                                                            <li>{{ $qualification }}</li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <div class="flex mt-4 space-x-4">
                                    @auth
                                    @if(auth()->user()->hasRole('super-admin or admin'))
                                    <a href="{{ route('jobs.show', $job->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded transition duration-300 w-full md:w-auto text-center">
                                        View Job
                                    </a>
                                    @endif
                                @endauth
                                    
                                    @can('edit', $job)
                                        <a href="{{ route('jobs.edit', $job->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded transition duration-300 w-full md:w-auto text-center">
                                            Edit
                                        </a>
                                        <form action="{{ route('jobs.destroy', $job->id) }}" method="POST" class="inline w-full md:w-auto">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded transition duration-300 w-full md:w-auto text-center" onclick="return confirm('Are you sure you want to delete this job?')">Delete</button>
                                        </form>
                                    @endcan
                                    @auth
                                        @if(auth()->user()->hasRole('alumni'))
                                            <a href="{{ route('jobs.apply', $job->id) }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded transition duration-300 w-full md:w-auto text-center">
                                                Apply For Job
                                            </a>
                                        @endif
                                    @endauth
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
