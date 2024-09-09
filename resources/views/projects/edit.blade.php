@extends('layouts.app')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Project') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('projects.update', $project) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                        <input type="text" name="title" id="title" value="{{ $project->title }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="mb-4">
                        <label for="summary" class="block text-gray-700 text-sm font-bold mb-2">Summary:</label>
                        <textarea name="summary" id="summary" rows="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>{{ $project->summary }}</textarea>
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                        <textarea name="description" id="description" rows="5" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>{{ $project->description }}</textarea>
                    </div>
                    <div class="mb-4">
                        <label for="video_url" class="block text-gray-700 text-sm font-bold mb-2">Video URL:</label>
                        <input type="url" name="video_url" id="video_url" value="{{ $project->video_url }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4">
                        <label class="required block text-dark-700 text-sm font-bold mb-2">Project Visibility</label>
                        <div>
                            <label class="inline-flex items-center">
                                <input type="radio" name="visibility" value="public" class="form-radio text-dark-800" required>
                                <span class="ml-2">Public</span>
                            </label>
                            <label class="inline-flex items-center ml-6">
                                <input type="radio" name="visibility" value="private" class="form-radio text-dark-800" required>
                                <span class="ml-2">Private</span>
                            </label>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Update Project
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
