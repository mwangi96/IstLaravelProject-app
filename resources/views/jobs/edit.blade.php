<x-app-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Edit Job</h1>
        <form action="{{ route('jobs.update', $job->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="title" class="block text-gray-700">Title</label>
                <input type="text" name="title" id="title" class="w-full border-gray-300 rounded mt-1" value="{{ $job->title }}" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700">Description</label>
                <textarea name="description" id="description" class="w-full border-gray-300 rounded mt-1" required>{{ $job->description }}</textarea>
            </div>
            <div class="mb-4">
                <label for="qualifications" class="block text-gray-700">Qualifications</label>
                <textarea name="qualifications" id="qualifications" class="w-full border-gray-300 rounded mt-1" required>{{ $job->qualifications }}</textarea>
            </div>
            <div class="mb-4">
                <label for="location" class="block text-gray-700">Location</label>
                <input type="text" name="location" id="location" class="w-full border-gray-300 rounded mt-1" value="{{ $job->location }}" required>
            </div>
            <div class="mb-4">
                <label for="salary" class="block text-gray-700">Salary</label>
                <input type="text" name="salary" id="salary" class="w-full border-gray-300 rounded mt-1" value="{{ $job->salary }}" required>
            </div>
            <div class="mb-4">
                <label for="image" class="block text-gray-700">Image</label>
                <input type="file" name="image" id="image" class="w-full border-gray-300 rounded mt-1">
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
        </form>
    </div>
</x-app-layout>
