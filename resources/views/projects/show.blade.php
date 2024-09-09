{{-- @extends('layouts.app')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $project->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                
                <!-- Video Presentation Section -->
                <div class="mt-4">
                    <div class="rounded-xl p-1 mt-8 text-center">
                        <label class="block text-gray-700 text-2xl lg:text-3xl font-bold mb-2" for="video_url">
                            <i class="fa-solid fa-video"></i> Video Presentation
                        </label>
                        @if (isset($project) && $project->video_url)
                            @php
                                $youtubePattern = '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^&?\/]+)/';
                                $isYouTube = preg_match($youtubePattern, $project->video_url, $match);
                            @endphp

                            @if ($isYouTube && isset($match[1]))
                                @php
                                    $videoId = $match[1];
                                @endphp
                                <div class="w-full h-64 sm:h-80 md:h-96 lg:h-[500px] mt-2 rounded-xl overflow-hidden">
                                    <iframe class="w-full h-full rounded-xl"
                                        src="https://www.youtube.com/embed/{{ $videoId }}"
                                        frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                </div>
                            @endif
                        @else
                            <p class="text-red-500">Video URL is not available or invalid.</p>
                        @endif
                    </div>
                </div>

                <!-- Summary Section -->
                <div class="mt-8">
                    <h3 class="text-lg font-semibold mb-2">Summary</h3>
                    <p class="text-gray-600 mb-4">{{ $project->summary }}</p>
                </div>

                <!-- Description Section -->
                <div class="mt-8">
                    <h3 class="text-lg font-semibold mb-2">Description</h3>
                    <p class="text-gray-600 mb-4">{{ $project->description }}</p>
                </div>

                <!-- Visibility Section -->
                <div class="mt-10">
                    <p class="text-sm text-gray-500">
                        {{ $project->visibility }}
                    </p>
                </div>

                <!-- Action Buttons -->
                <div class="mt-6 flex flex-col sm:flex-row sm:space-x-4 space-y-4 sm:space-y-0">
                    <a href="{{ route('projects.edit', $project) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-center">Edit Project</a>
                    <form action="{{ route('projects.destroy', $project) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded text-center" onclick="return confirm('Are you sure you want to delete this project?')">Delete Project</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection --}}
