<x-app-layout>
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
                        Publish New Projects
                    </a>
                </div>
                <div class="grid gap-6 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1">
                    @foreach ($projects as $project)
                        <div class="bg-white border rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow duration-300">
                            <h3 class="text-xl font-semibold mb-2">{{ $project->title }}</h3>
                            <p class="text-gray-600 mb-4">{{ $project->summary }}</p>
                            <div class="flex space-x-4">
                                <a href="{{ route('projects.show', $project) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-300">
                                    View
                                </a>
                                <a href="{{ route('projects.edit', $project) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition duration-300">
                                    Edit
                                </a>
                                <form action="{{ route('projects.destroy', $project) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded transition duration-300" onclick="return confirm('Are you sure you want to delete this project?')">
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
</x-app-layout>
