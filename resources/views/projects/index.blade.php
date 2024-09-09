@extends('layouts.app')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Projects') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-semibold">Projects</h2>
                    <a href="{{ route('projects.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-300">
                        Publish New Project
                    </a>
                </div>

                <!-- Projects Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($projects as $project)
                        <div class="bg-white shadow-lg rounded-lg p-6">
                            <!-- Video Presentation Section -->
                            <div class="rounded-xl text-center">
                                @if ($project->video_url)
                                    @php
                                        $youtubePattern = '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^&?\/]+)/';
                                        $isYouTube = preg_match($youtubePattern, $project->video_url, $match);
                                    @endphp

                                    @if ($isYouTube && isset($match[1]))
                                        @php
                                            $videoId = $match[1];
                                        @endphp
                                        <div class="w-full h-40 sm:h-48 md:h-56 lg:h-64 mb-4 rounded-xl overflow-hidden">
                                            <iframe class="w-full h-full rounded-xl"
                                                src="https://www.youtube.com/embed/{{ $videoId }}"
                                                frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen></iframe>
                                        </div>
                                    @else
                                        <p class="text-red-500">Video URL is not available or invalid.</p>
                                    @endif
                                @endif
                            </div>

                            <!-- Project Information -->
                            <h3 class="text-lg font-semibold mb-2">{{ $project->title }}</h3>
                            <p class="text-gray-600 mb-2">{{ $project->summary }}</p>
                            {{-- <p class="text-sm text-gray-500">{{ $project->visibility }}</p> --}}

                            <!-- Action Buttons -->
                            <div class="mt-4 flex space-x-2">
                                {{-- <a href="{{ route('projects.show', $project) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-3 rounded text-center">
                                    View
                                </a> --}}
                                <a href="{{ route('projects.edit', $project) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded text-center">
                                    Edit
                                </a>
                                <form action="{{ route('projects.destroy', $project) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded text-center" onclick="return confirm('Are you sure you want to delete this project?')">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
