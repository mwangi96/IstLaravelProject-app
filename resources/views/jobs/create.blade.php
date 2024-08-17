<x-app-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Create Job</h1>
        <form action="{{ route('jobs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-gray-700">Title</label>
                <input type="text" name="title" id="title" class="w-full border-gray-300 rounded mt-1" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700">Description</label>
                <textarea name="description" id="description" class="w-full border-gray-300 rounded mt-1" required></textarea>
            </div>
            <div class="mb-4">
                <label for="qualifications" class="block text-gray-700">Qualifications</label>
                <textarea name="qualifications" id="qualifications" class="w-full border-gray-300 rounded mt-1" required></textarea>
            </div>
             <!-- New Salary Field -->
             <div class="mb-4">
                <label for="salary" class="block text-gray-700">Salary</label>
                <input type="number" name="salary" id="salary" step="0.01" class="w-full border-gray-300 rounded mt-1">
            </div>
            <div class="mb-4">
                <label for="location" class="block text-gray-700">Location</label>
                <input type="text" name="location" id="location" class="w-full border-gray-300 rounded mt-1" required>
            </div>
            <div class="mb-4">
                <label for="image" class="block text-gray-700">Image</label>
                <input type="file" name="image" id="image" class="w-full border-gray-300 rounded mt-1">
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create</button>
        </form>
    </div>
</x-app-layout>
