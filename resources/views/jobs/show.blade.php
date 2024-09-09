@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h1 class="text-2xl sm:text-3xl font-bold mb-4">{{ $job->title }}</h1>
            
            @if ($job->image)
                <img src="{{ asset('storage/' . $job->image) }}" alt="{{ $job->title }}" class="w-full h-48 sm:h-64 object-cover mb-4 rounded-lg">
            @endif

            <div class="mb-4">
                <h2 class="text-lg sm:text-xl font-semibold">Description</h2>
                <p class="mt-2 text-gray-700">{{ $job->description }}</p>
            </div>

            <div class="mb-4">
                <h2 class="text-lg sm:text-xl font-semibold">Qualifications</h2>
                <p class="mt-2 text-gray-700">{{ $job->qualifications }}</p>
            </div>

            <div class="mb-4">
                <h2 class="text-lg sm:text-xl font-semibold">Location</h2>
                <p class="mt-2 text-gray-700">{{ $job->location }}</p>
            </div>

            @if ($job->salary)
                <div class="mb-4">
                    <h2 class="text-lg sm:text-xl font-semibold">Salary</h2>
                    <p class="mt-2 text-gray-700">${{ number_format($job->salary, 2) }}</p>
                </div>
            @endif

            <div class="mt-6 flex flex-col sm:flex-row justify-between items-center">
                <a href="{{ route('jobs.index') }}" class="text-blue-500 hover:underline mb-4 sm:mb-0">
                    <i class="fas fa-arrow-left"></i> Back to Job Listings
                </a>
            
                @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasRole('admin'))
                    <div class="flex space-x-4">
                        <a href="{{ route('jobs.edit', $job->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded transition duration-300">Edit</a>
                        <form action="{{ route('jobs.destroy', $job->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded transition duration-300" onclick="return confirm('Are you sure you want to delete this job?')">Delete</button>
                        </form>
                    </div>
                @endif
            </div>            
        </div>
    </div>
@endsection
