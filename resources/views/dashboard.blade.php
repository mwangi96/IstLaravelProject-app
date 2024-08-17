@extends('layouts.app')

@section('content')
    @role('super-admin|admin')
    <div class="bg-gray-50 min-h-screen py-8">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="bg-white p-6 shadow-lg rounded-lg">
                <div class="text-gray-900">
                    <h1 class="text-3xl font-bold text-cyan-700">Welcome, <b>{{ Auth::user()->username }}</b></h1>
                    <p class="text-base text-gray-600 mt-2">Main dashboard for the Application.</p>
                    <div class="mt-6 flex flex-wrap gap-4">
                        <a href="{{ url('roles') }}" class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg transition-colors">Roles</a>
                        <a href="{{ url('permissions') }}" class="inline-block bg-teal-500 hover:bg-teal-600 text-white font-bold py-2 px-4 rounded-lg transition-colors">Permissions</a>
                        <a href="{{ url('users') }}" class="inline-block bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded-lg transition-colors">Users</a>
                        <a href="{{ url('jobs') }}" class="inline-block bg-slate-500 hover:bg-slate-600 text-white font-bold py-2 px-4 rounded-lg transition-colors">Jobs</a>
                        <a href="{{ url('alumni_profiles') }}" class="inline-block bg-purple-500 hover:bg-purple-600 text-white font-bold py-2 px-4 rounded-lg transition-colors">Profiles</a>
                        <a href="{{ url('projects') }}" class="inline-block bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg transition-colors">Projects</a>
                        <a href="{{ url('applications') }}" class="inline-block bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg transition-colors">Applications</a>
                    </div>
                </div>
                <div class="mt-8">
                    <div class="bg-gray-50 p-6 shadow-md rounded-lg">
                        <h2 class="text-2xl font-semibold mb-4">Actions</h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                            <!-- Action cards similar to your example -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endrole

    @role('alumni')
    <div class="bg-gray-50 min-h-screen py-8">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="bg-white p-6 shadow-lg rounded-lg">
                <div class="text-gray-900">
                    <h1 class="text-3xl font-bold text-cyan-700">Welcome, <b>{{ Auth::user()->username }}</b></h1>
                    <p class="text-base text-gray-600 mt-2">Main dashboard for Alumni.</p>
                    <div class="mt-6 flex flex-wrap gap-4">
                        <a href="{{ url('jobs') }}" class="inline-block bg-slate-500 hover:bg-slate-600 text-white font-bold py-2 px-4 rounded-lg transition-colors">Jobs</a>
                        <a href="{{ url('alumni_profiles') }}" class="inline-block bg-purple-500 hover:bg-purple-600 text-white font-bold py-2 px-4 rounded-lg transition-colors">Profiles</a>
                        <a href="{{ url('projects') }}" class="inline-block bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg transition-colors">Projects</a>
                        <a href="{{ url('applications') }}" class="inline-block bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg transition-colors">Applications</a>
                    </div>
                </div>
                <div class="mt-8">
                    <div class="bg-gray-50 p-6 shadow-md rounded-lg">
                        <h2 class="text-2xl font-semibold mb-4">Actions</h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                            <!-- Action cards start here -->
                            <div class="bg-white p-4 rounded-lg shadow-md">
                                <div class="flex items-center justify-center h-16 w-16 rounded-full bg-blue-100 mb-4">
                                    <i class="fas fa-user-graduate text-blue-500 text-2xl"></i>
                                </div>
                                <h3 class="text-lg font-semibold mb-2">Update Profile</h3>
                                <p class="text-gray-600 mb-4">Keep your alumni profile up-to-date with the latest information.</p>
                                <a href="{{ url('alumni_profiles/edit') }}" class="text-blue-500 hover:text-blue-600 font-semibold">Edit Profile</a>
                            </div>
                            <div class="bg-white p-4 rounded-lg shadow-md">
                                <div class="flex items-center justify-center h-16 w-16 rounded-full bg-green-100 mb-4">
                                    <i class="fas fa-briefcase text-green-500 text-2xl"></i>
                                </div>
                                <h3 class="text-lg font-semibold mb-2">Search Jobs</h3>
                                <p class="text-gray-600 mb-4">Explore available job opportunities tailored for alumni.</p>
                                <a href="{{ url('jobs') }}" class="text-green-500 hover:text-green-600 font-semibold">View Jobs</a>
                            </div>
                            <div class="bg-white p-4 rounded-lg shadow-md">
                                <div class="flex items-center justify-center h-16 w-16 rounded-full bg-yellow-100 mb-4">
                                    <i class="fas fa-tasks text-yellow-500 text-2xl"></i>
                                </div>
                                <h3 class="text-lg font-semibold mb-2">Manage Projects</h3>
                                <p class="text-gray-600 mb-4">Oversee and update your ongoing and past projects.</p>
                                <a href="{{ url('projects') }}" class="text-yellow-500 hover:text-yellow-600 font-semibold">View Projects</a>
                            </div>
                            <div class="bg-white p-4 rounded-lg shadow-md">
                                <div class="flex items-center justify-center h-16 w-16 rounded-full bg-red-100 mb-4">
                                    <i class="fas fa-envelope text-red-500 text-2xl"></i>
                                </div>
                                <h3 class="text-lg font-semibold mb-2">Job Applications</h3>
                                <p class="text-gray-600 mb-4">Review and manage your job applications and their status.</p>
                                <a href="{{ url('applications') }}" class="text-red-500 hover:text-red-600 font-semibold">View Applications</a>
                            </div>
                            <!-- Additional action cards can be added here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endrole
@endsection
