@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-10">
        <div class="bg-white shadow-xl rounded-lg overflow-hidden">
            <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <h4 class="text-2xl font-semibold text-gray-800">Job Applications</h4>
                    <a href ="{{ route('jobs.index') }}" class="bg-red-600 text-white px-5 py-2 rounded-lg hover:bg-red-700 transition duration-300">
                        Back to Jobs
                    </a>
                    
                </div>
            </div>
            <div class="px-6 py-4">
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left text-sm font-semibold text-gray-500 uppercase tracking-wider">Job Title</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-sm font-semibold text-gray-500 uppercase tracking-wider">Name</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-sm font-semibold text-gray-500 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-sm font-semibold text-gray-500 uppercase tracking-wider">Cover Letter</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-sm font-semibold text-gray-500 uppercase tracking-wider">Resume</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-sm font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                                <th
                                @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasRole('admin'))
                                class="px-6 py-3 bg-gray-50 text-left text-sm font-semibold text-gray-500 uppercase tracking-wider">Actions</th>
                                @endif
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($applications as $application)
                                <tr>
                                    <td class="px-6 py-4 text-gray-800 whitespace-no-wrap">{{ $application->job->title }}</td>
                                    <td class="px-6 py-4 text-gray-800 whitespace-no-wrap">{{ $application->name }}</td>
                                    <td class="px-6 py-4 text-gray-800 whitespace-no-wrap">{{ $application->email }}</td>
                                    <td class="px-6 py-4 text-gray-800 whitespace-no-wrap">{{ Str::limit($application->cover_letter, 50) }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <a href="{{ asset('storage/' . $application->resume) }}" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition duration-300 flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h2.82a2 2 0 00-1.42-2 4 4 0 00-7.13 2.12 2 2 0 00-1.42 2H9a3 3 0 003 3v1H4zm13 1a3 3 0 003-3h2a2 2 0 00-1.42 2 4 4 0 00-7.13 2.12 2 2 0 00-1.42 2H18a3 3 0 003-3v-1h-1zm-1-1a1 1 0 00-1-1h-1a1 1 0 00-1 1v1h1a1 1 0 001-1z" />
                                            </svg>
                                            Download Resume
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasRole('admin'))
                                            @if($application->status == 'approved')
                                                <span class="text-green-500">{{ __('You approved the application') }}</span>
                                            @elseif($application->status == 'denied')
                                                <span class="text-red-500">{{ __('You denied the application') }}</span>
                                            @else
                                                <span>{{ __('The application is under review') }}</span>
                                            @endif
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap flex space-x-2">
                                        @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasRole('admin'))
                                            <a href="{{ route('application.review', $application->id) }}">
                                                <x-secondary-button>{{ __('Review') }}</x-secondary-button>
                                            </a>
                                            <a href="{{ route('application.approve', $application->id) }}">
                                                <x-primary-button>{{ __('Approve') }}</x-primary-button>
                                            </a>
                                            <a href="{{ route('application.deny', $application->id) }}">
                                                <x-danger-button>{{ __('Deny') }}</x-danger-button>
                                            </a>
                                        @elseif(auth()->user()->hasRole('alumni'))
                                            @if($application->status == 'approved')
                                                <span class="text-green-500">{{ __('Application approved') }}</span>
                                            @elseif($application->status == 'denied')
                                                <span class="text-red-500">{{ __('Application denied') }}</span>
                                            @else
                                                <span>{{ __('Application in progress') }}</span>
                                            @endif
                                        @endif
                                    </td>                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
