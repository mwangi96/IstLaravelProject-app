@extends('layouts.app')

@section('content')
    <!-- Main Content -->
    <main class="flex-grow">
        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <!-- Job Portal Content -->
            <div class="mt-16">
                <h2 class="text-2xl font-semibold text-black dark:text-black mb-6">Welcome to Our Job Portal</h2>
                <p class="text-blue-600 dark:text-blue-600 mb-4">
                    Find your dream job or hire the perfect candidate. Our job portal connects talented professionals with top employers.
                </p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                    <div class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                        <div>
                            <h3 class="text-xl font-semibold text-red-600 dark:text-red">For Job Seekers</h3>
                            <p class="mt-4 text-blue-800 dark:text-blue-800 text-sm leading-relaxed">
                                Browse thousands of job listings, upload your resume, and apply with ease. Get noticed by top employers in your field.
                            </p>
                            <div class="mt-2">
                                <a href="#" class="text-blue-500 hover:underline">Find a Job</a>
                            </div>
                        </div>
                    </div>
                    <div class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                        <div>
                            <h3 class="text-xl font-semibold text-red-600 dark:text-red">For Employers</h3>
                            <p class="mt-4 text-blue-800 dark:text-blue-800 text-sm leading-relaxed">
                                Post job openings, search our candidate database, and find the perfect fit for your company. Streamline your hiring process with our tools.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-between space-x-4 p-4 mt-8">
                <div class="border border-gray-300 rounded-lg p-4 flex-1">
                    <h2 class="text-xl font-bold mb-4">Featured Jobs</h2>
                    <!-- Featured jobs content goes here -->
                    <a href="/featured-jobs" class="text-blue-500 hover:underline">See all featured jobs</a>
                </div>
                <div class="border border-gray-300 rounded-lg p-4 flex-1">
                    <h2 class="text-xl font-bold mb-4">Jobs in Kenya</h2>
                    <!-- Jobs in Kenya content goes here -->
                    <a href="/jobs-in-kenya" class="text-blue-500 hover:underline">See all jobs in Kenya</a>
                </div>
            </div>
        </div>
    </main>
@endsection
