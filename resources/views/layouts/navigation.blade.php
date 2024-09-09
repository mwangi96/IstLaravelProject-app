@php
    $notifications = Auth::user()->unreadNotifications;
    $notificationCount = $notifications->count();
@endphp

<nav x-data="{ open: false, showDropdown: false }" class="bg-red-800 border-b border-red-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('storage/images/image.png') }}" class="h-8 w-auto" alt="Logo">
                    </a>
                </div>
                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:flex ml-10 items-center">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-white hover:text-gray-200">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    @role('super-admin|admin')
                    <a href="{{ url('roles') }}" class="text-white hover:text-gray-200">Roles</a>
                    <a href="{{ url('permissions') }}" class="text-white hover:text-gray-200">Permissions</a>
                    <a href="{{ url('users') }}" class="text-white hover:text-gray-200">Users</a>
                    <a href="{{ url('alumni_profiles') }}" class="text-white hover:text-gray-200">Profile</a>
                    <a href="{{ url('jobs') }}" class="text-white hover:text-gray-200">Jobs</a>
                    <a href="{{ url('projects') }}" class="text-white hover:text-gray-200">Projects</a>
                    <a href="{{ url('applications') }}" class="text-white hover:text-gray-200">Applications</a>
                    @endrole
                    @role('alumni')
                    <a href="{{ url('alumni_profiles') }}" class="text-white hover:text-gray-200">Profile</a>
                    <a href="{{ url('jobs') }}" class="text-white hover:text-gray-200">Jobs</a>
                    <a href="{{ url('projects') }}" class="text-white hover:text-gray-200">Projects</a>
                    <a href="{{ url('applications') }}" class="text-white hover:text-gray-200">Applications</a>
                    @endrole
                </div>
            </div>

            <!-- Settings Dropdown and Notifications -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <div class="flex items-center space-x-1">
                    <!-- Notification Icon -->
                    <div class="relative">
                        <a href="{{ route('notifications.index') }}" class="text-white hover:text-gray-200">
                            <svg class="w-6 h-6 text-white hover:text-gray-200 cursor-pointer" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.121V11a7.003 7.003 0 00-5-6.732V4a2 2 0 10-4 0v.268A7.003 7.003 0 004 11v3.121c0 .417-.162.818-.448 1.118L2 17h5m7 0a3 3 0 11-6 0h6z" />
                            </svg>
                            <!-- Notification Count -->
                            @if($notifications->count() > 0)
                                <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">
                                    {{ $notifications->count() }}
                                </span>
                            @endif
                        </a>
                    </div>
                    
                    <!-- User Dropdown -->
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <div class="relative">
                                <button @click="showDropdown = !showDropdown" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-red-800 hover:text-gray-200 focus:outline-none transition ease-in-out duration-150">
                                    @if(Auth::check())
                                    <div>{{ Auth::user()->username }}</div>
                                    @endif
                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </div>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')" class="text-gray-700">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" class="text-gray-700"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-slate-700 hover:text-gray-200 hover:bg-gray-700 focus:outline-none focus:bg-gray-700 focus:text-gray-200 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': ! open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-2">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="block pl-3 pr-4 py-2 text-base font-medium text-white hover:text-gray-200 hover:bg-gray-700 transition duration-300">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            
            @role('super-admin|admin')
                <a href="{{ url('roles') }}" class="block pl-3 pr-4 py-2 text-base font-medium text-white hover:text-gray-200 hover:bg-gray-700 transition duration-300">
                    Roles
                </a>
                <a href="{{ url('permissions') }}" class="block pl-3 pr-4 py-2 text-base font-medium text-white hover:text-gray-200 hover:bg-gray-700 transition duration-300">
                    Permissions
                </a>
                <a href="{{ url('users') }}" class="block pl-3 pr-4 py-2 text-base font-medium text-white hover:text-gray-200 hover:bg-gray-700 transition duration-300">
                    Users
                </a>
                <a href="{{ url('alumni_profiles') }}" class="block pl-3 pr-4 py-2 text-base font-medium text-white hover:text-gray-200 hover:bg-gray-700 transition duration-300">
                    Profile
                </a>
                <a href="{{ url('jobs') }}" class="block pl-3 pr-4 py-2 text-base font-medium text-white hover:text-gray-200 hover:bg-gray-700 transition duration-300">
                    Jobs
                </a>
                <a href="{{ url('projects') }}" class="block pl-3 pr-4 py-2 text-base font-medium text-white hover:text-gray-200 hover:bg-gray-700 transition duration-300">
                    Projects
                </a>
                <a href="{{ url('applications') }}" class="block pl-3 pr-4 py-2 text-base font-medium text-white hover:text-gray-200 hover:bg-gray-700 transition duration-300">
                    Applications
                </a>
            @endrole
    
            @role('alumni')
                <a href="{{ url('jobs') }}" class="block pl-3 pr-4 py-2 text-base font-medium text-white hover:text-gray-200 hover:bg-gray-700 transition duration-300">
                    Jobs
                </a>
                <a href="{{ url('alumni_profiles') }}" class="block pl-3 pr-4 py-2 text-base font-medium text-white hover:text-gray-200 hover:bg-gray-700 transition duration-300">
                    Profile
                </a>
                <a href="{{ url('projects') }}" class="block pl-3 pr-4 py-2 text-base font-medium text-white hover:text-gray-200 hover:bg-gray-700 transition duration-300">
                    Projects
                </a>
                <a href="{{ url('applications') }}" class="block pl-3 pr-4 py-2 text-base font-medium text-white hover:text-gray-200 hover:bg-gray-700 transition duration-300">
                    Applications
                </a>
            @endrole
        </div>
    

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-white">{{ Auth::user()->username }}</div>
            </div>
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="block pl-3 pr-4 py-2 text-base font-medium text-white hover:text-gray-200 hover:bg-gray-700 transition duration-300">
                    {{ __('Profile') }}
                </x-responsive-nav-link>
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" class="block pl-3 pr-4 py-2 text-base font-medium text-white hover:text-gray-200 hover:bg-gray-700 transition duration-300"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
    </div>

     </div>
    </div>
</nav>
