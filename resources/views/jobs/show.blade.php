<x-app-layout>
    <div class="container mx-auto px-4 py-6">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h1 class="text-3xl font-bold mb-4">{{ $job->title }}</h1>
            
            @if ($job->image)
                <img src="{{ asset('storage/' . $job->image) }}" alt="{{ $job->title }}" class="w-full h-64 object-cover mb-4 rounded-lg">
            @endif

            <div class="mb-4">
                <h2 class="text-xl font-semibold">Description</h2>
                <p class="mt-2 text-gray-700">{{ $job->description }}</p>
            </div>

            <div class="mb-4">
                <h2 class="text-xl font-semibold">Qualifications</h2>
                <p class="mt-2 text-gray-700">{{ $job->qualifications }}</p>
            </div>

            <div class="mb-4">
                <h2 class="text-xl font-semibold">Location</h2>
                <p class="mt-2 text-gray-700">{{ $job->location }}</p>
            </div>

            @if ($job->salary)
                <div class="mb-4">
                    <h2 class="text-xl font-semibold">Salary</h2>
                    <p class="mt-2 text-gray-700">${{ number_format($job->salary, 2) }}</p>
                </div>
            @endif

            <!-- Apply Button -->
            @auth
                <div class="mt-6 flex justify-between">
                    <a href="{{ route('jobs.index') }}" class="text-blue-500 hover:underline">Back to Job Listing</a>
                    <a href="{{ route('jobs.apply', $job) }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Apply for Job</a>
                </div>
            @else
                <div class="mt-6 flex justify-between">
                    <a href="{{ route('jobs.index') }}" class="text-blue-500 hover:underline">Back to Job List</a>
                    <a href="{{ route('login') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Login to Apply</a>
                </div>
            @endauth
        </div>
    </div>
</x-app-layout>
