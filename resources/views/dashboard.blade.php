@extends('layouts.app')

@section('content')
    @role('super-admin|admin')
    <div class="bg-gray-50 min-h-screen py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-lg rounded-lg">
                <div class="text-gray-900">
                    <h1 class="text-3xl font-bold text-cyan-700">Welcome, <b>{{ Auth::user()->username }}</b></h1>
                    <p class="text-base text-gray-600 mt-2">Main dashboard for the Application.</p>
                    <div class="mt-6 flex flex-wrap gap-4 justify-center sm:justify-start">
                        <a href="{{ url('roles') }}" class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg transition-colors">Roles</a>
                        <a href="{{ url('permissions') }}" class="inline-block bg-teal-500 hover:bg-teal-600 text-white font-bold py-2 px-4 rounded-lg transition-colors">Permissions</a>
                        <a href="{{ url('users') }}" class="inline-block bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded-lg transition-colors">Users</a>
                        <a href="{{ url('jobs') }}" class="inline-block bg-slate-500 hover:bg-slate-600 text-white font-bold py-2 px-4 rounded-lg transition-colors">Jobs</a>
                        <a href="{{ url('alumni_profiles') }}" class="inline-block bg-purple-500 hover:bg-purple-600 text-white font-bold py-2 px-4 rounded-lg transition-colors">Profile</a>
                        <a href="{{ url('projects') }}" class="inline-block bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg transition-colors">Projects</a>
                        <a href="{{ url('applications') }}" class="inline-block bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg transition-colors">Applications</a>
                    </div>
                </div>
                <div class="mt-8">
                    <div class="bg-gray-50 p-6 shadow-md rounded-lg">
                        <h2 class="text-2xl font-semibold mb-4">Actions</h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                            <!-- Action card: Update Profile -->
                            <div class="bg-white p-4 rounded-lg shadow-md">
                                <div class="flex items-center justify-center h-16 w-16 rounded-full bg-blue-100 mb-4">
                                    <i class="fas fa-user-graduate text-blue-500 text-2xl"></i>
                                </div>
                                <h3 class="text-lg font-semibold mb-2">Update Profile</h3>
                                <p class="text-gray-600 mb-4">Keep your alumni profile up-to-date with the latest information.</p>
                                <a href="{{ url('alumni_profiles/edit') }}" class="text-blue-500 hover:text-blue-600 font-semibold">Edit Profile</a>
                            </div>
                
                            <!-- Action card: Search Jobs -->
                            <div class="bg-white p-4 rounded-lg shadow-md">
                                <div class="flex items-center justify-center h-16 w-16 rounded-full bg-green-100 mb-4">
                                    <i class="fas fa-briefcase text-green-500 text-2xl"></i>
                                </div>
                                <h3 class="text-lg font-semibold mb-2">Search Jobs</h3>
                                <p class="text-gray-600 mb-4">Explore available job opportunities tailored for alumni.</p>
                                <a href="{{ url('jobs') }}" class="text-green-500 hover:text-green-600 font-semibold">View Jobs</a>
                            </div>
                
                            <!-- Action card: Manage Projects -->
                            <div class="bg-white p-4 rounded-lg shadow-md">
                                <div class="flex items-center justify-center h-16 w-16 rounded-full bg-yellow-100 mb-4">
                                    <i class="fas fa-tasks text-yellow-500 text-2xl"></i>
                                </div>
                                <h3 class="text-lg font-semibold mb-2">Manage Projects</h3>
                                <p class="text-gray-600 mb-4">Oversee and update your ongoing and past projects.</p>
                                <a href="{{ url('projects') }}" class="text-yellow-500 hover:text-yellow-600 font-semibold">View Projects</a>
                            </div>
                
                            <!-- Action card: Job Applications -->
                            <div class="bg-white p-4 rounded-lg shadow-md">
                                <div class="flex items-center justify-center h-16 w-16 rounded-full bg-red-100 mb-4">
                                    <i class="fas fa-envelope text-red-500 text-2xl"></i>
                                </div>
                                <h3 class="text-lg font-semibold mb-2">Job Applications</h3>
                                <p class="text-gray-600 mb-4">Review and manage your job applications and their status.</p>
                                <a href="{{ url('applications') }}" class="text-red-500 hover:text-red-600 font-semibold">View Applications</a>
                            </div>
                
                            <!-- Action card: Manage Roles -->
                            <div class="bg-white p-4 rounded-lg shadow-md">
                                <div class="flex items-center justify-center h-16 w-16 rounded-full bg-teal-100 mb-4">
                                    <i class="fas fa-user-shield text-teal-500 text-2xl"></i>
                                </div>
                                <h3 class="text-lg font-semibold mb-2">Manage Roles</h3>
                                <p class="text-gray-600 mb-4">Assign and manage user roles within the application.</p>
                                <a href="{{ url('roles') }}" class="text-teal-500 hover:text-teal-600 font-semibold">View Roles</a>
                            </div>
                
                            <!-- Action card: Manage Permissions -->
                            <div class="bg-white p-4 rounded-lg shadow-md">
                                <div class="flex items-center justify-center h-16 w-16 rounded-full bg-orange-100 mb-4">
                                    <i class="fas fa-key text-orange-500 text-2xl"></i>
                                </div>
                                <h3 class="text-lg font-semibold mb-2">Manage Permissions</h3>
                                <p class="text-gray-600 mb-4">Control access by managing user permissions.</p>
                                <a href="{{ url('permissions') }}" class="text-orange-500 hover:text-orange-600 font-semibold">View Permissions</a>
                            </div>
                
                            <!-- Action card: Manage Users -->
                            <div class="bg-white p-4 rounded-lg shadow-md">
                                <div class="flex items-center justify-center h-16 w-16 rounded-full bg-indigo-100 mb-4">
                                    <i class="fas fa-users-cog text-indigo-500 text-2xl"></i>
                                </div>
                                <h3 class="text-lg font-semibold mb-2">Manage Users</h3>
                                <p class="text-gray-600 mb-4">Manage user accounts and settings within the system.</p>
                                <a href="{{ url('users') }}" class="text-indigo-500 hover:text-indigo-600 font-semibold">View Users</a>
                            </div>
                
                            <!-- Action card: View Profiles -->
                            <div class="bg-white p-4 rounded-lg shadow-md">
                                <div class="flex items-center justify-center h-16 w-16 rounded-full bg-purple-100 mb-4">
                                    <i class="fas fa-id-card text-purple-500 text-2xl"></i>
                                </div>
                                <h3 class="text-lg font-semibold mb-2">View Profile</h3>
                                <p class="text-gray-600 mb-4">Browse and manage user profile within the system.</p>
                                <a href="{{ url('alumni_profiles') }}" class="text-purple-500 hover:text-purple-600 font-semibold">View Profiles</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endrole

    @role('alumni')
    <div class="bg-gray-50 min-h-screen py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-lg rounded-lg">
                <div class="text-gray-900">
                    <h1 class="text-3xl font-bold text-cyan-700">Welcome, <b>{{ Auth::user()->username }}</b></h1>
                    <p class="text-base text-gray-600 mt-2">Main dashboard for Alumni.</p>
                    <div class="mt-6 flex flex-wrap gap-4 justify-center sm:justify-start">
                        <a href="{{ url('alumni_profiles/edit') }}" class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg transition-colors">Update Profile</a>
                        <a href="{{ url('jobs') }}" class="inline-block bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg transition-colors">Search Jobs</a>
                        <a href="{{ url('projects') }}" class="inline-block bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded-lg transition-colors">Manage Projects</a>
                        <a href="{{ url('applications') }}" class="inline-block bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg transition-colors">Job Applications</a>
                    </div>
                </div>
                <div class="mt-8">
                    <div class="bg-gray-50 p-6 shadow-md rounded-lg">
                        <h2 class="text-2xl font-semibold mb-4">Actions</h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                            <!-- Action card: Update Profile -->
                            <div class="bg-white p-4 rounded-lg shadow-md">
                                <div class="flex items-center justify-center h-16 w-16 rounded-full bg-blue-100 mb-4">
                                    <i class="fas fa-user-graduate text-blue-500 text-2xl"></i>
                                </div>
                                <h3 class="text-lg font-semibold mb-2">Update Profile</h3>
                                <p class="text-gray-600 mb-4">Keep your alumni profile up-to-date with the latest information.</p>
                                <a href="{{ url('alumni_profiles/edit') }}" class="text-blue-500 hover:text-blue-600 font-semibold">Edit Profile</a>
                            </div>
                
                            <!-- Action card: Search Jobs -->
                            <div class="bg-white p-4 rounded-lg shadow-md">
                                <div class="flex items-center justify-center h-16 w-16 rounded-full bg-green-100 mb-4">
                                    <i class="fas fa-briefcase text-green-500 text-2xl"></i>
                                </div>
                                <h3 class="text-lg font-semibold mb-2">Search Jobs</h3>
                                <p class="text-gray-600 mb-4">Explore available job opportunities tailored for alumni.</p>
                                <a href="{{ url('jobs') }}" class="text-green-500 hover:text-green-600 font-semibold">View Jobs</a>
                            </div>
                
                            <!-- Action card: Manage Projects -->
                            <div class="bg-white p-4 rounded-lg shadow-md">
                                <div class="flex items-center justify-center h-16 w-16 rounded-full bg-yellow-100 mb-4">
                                    <i class="fas fa-tasks text-yellow-500 text-2xl"></i>
                                </div>
                                <h3 class="text-lg font-semibold mb-2">Manage Projects</h3>
                                <p class="text-gray-600 mb-4">Oversee and update your ongoing and past projects.</p>
                                <a href="{{ url('projects') }}" class="text-yellow-500 hover:text-yellow-600 font-semibold">View Projects</a>
                            </div>
                
                            <!-- Action card: Job Applications -->
                            <div class="bg-white p-4 rounded-lg shadow-md">
                                <div class="flex items-center justify-center h-16 w-16 rounded-full bg-red-100 mb-4">
                                    <i class="fas fa-envelope text-red-500 text-2xl"></i>
                                </div>
                                <h3 class="text-lg font-semibold mb-2">Job Applications</h3>
                                <p class="text-gray-600 mb-4">Review and manage your job applications and their status.</p>
                                <a href="{{ url('applications') }}" class="text-red-500 hover:text-red-600 font-semibold">View Applications</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endrole
@endsection
