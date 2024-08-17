<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $project->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-2">Summary</h3>
                <p class="text-gray-600 mb-4">{{ $project->summary }}</p>

                <h3 class="text-lg font-semibold mb-2">Description</h3>
                <p class="text-gray-600 mb-4">{{ $project->description }}</p>

                <div class="mt-4">
                    <div class="shadow-2xl shadow-gray-700 rounded-xl p-1 mt-8 text-center">
                        <label class="block text-gray-700 text-2xl lg:text-3xl font-bold mb-2"
                            for="video_url">
                            <i class="fa-solid fa-video"></i> Video Presentation
                        </label>
                        @if (isset($project) && $project->video_url)
                            @php
                                $youtubePattern =
                                    '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^&?\/]+)/';
                                $isYouTube = preg_match(
                                    $youtubePattern,
                                    $project->video_url,
                                    $match,
                                );
                            @endphp

                            @if ($isYouTube && isset($match[1]))
                                @php
                                    $videoId = $match[1];
                                @endphp
                                <iframe class="w-full h-96 mt-2 rounded-xl"
                                    src="https://www.youtube.com/embed/{{ $videoId }}"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                            @endif
                        @else
                            <p class="text-red-500">Video URL is not available or invalid.</p>
                        @endif
                    </div>
                </div>

                <div class="mt-10">
                    <p class="text-sm text-gray-500">
                        {{$project->visibility}}
                    </p>
                </div>

                <div class="mt-6 flex space-x-4">
                    <a href="{{ route('projects.edit', $project) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit Project</a>
                    <form action="{{ route('projects.destroy', $project) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="return confirm('Are you sure you want to delete this project?')">Delete Project</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
