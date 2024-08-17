{{-- <!-- resources/views/alumni_profiles/index.blade.php -->

<x-app-layout>
    <div class="container mx-auto px-4 py-6">
        @if($profiles->isEmpty())
        <!-- No Profile Found Section -->
        <div class="bg-yellow-100 border border-yellow-300 text-yellow-700 p-4 rounded-lg mb-8">
            <h2 class="font-semibold text-lg">No Profile Found</h2>
            <p class="mt-2">It looks like you haven't created any profiles yet. Click the button below to create a profile and start showcasing your skills and experience.</p>
            <a href="{{ route('alumni_profiles.create') }}" class="mt-4 inline-block px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                Create Your Profile
            </a>
        </div>
    @endif
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($profiles as $profile)
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <div class="p-4">
                        <div class="md:flex">
                            <!-- Left Side: Profile Picture and About Me -->
                            <div class="md:w-1/2">
                                <div class="flex items-center">
                                    <img class="w-24 h-24 rounded-full object-cover" src="{{ asset('storage/' . $profile->profile_pic) }}" alt="Profile Picture">
                                    <div class="ml-4">
                                        <h2 class="text-xl font-bold">{{ $profile->name }}</h2>
                                        <p class="text-gray-600">{{ $profile->who_am_i }}</p>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <h2 class="text-lg font-semibold">About Me</h2>
                                    <p class="text-gray-600">{{ $profile->about_me }}</p>
                                </div>

                                <div class="mt-4">
                                    <h2 class="text-lg font-semibold">Personal Details</h2>
                                    <ul class="text-gray-600 space-y-2">
                                        @if($profile->location)
                                            <li class="flex items-center"><i class="fas fa-map-marker-alt mr-2"></i>{{ $profile->location }}</li>
                                        @endif
                                        @if($profile->email)
                                            <li class="flex items-center"><i class="fas fa-envelope mr-2"></i><a href="mailto:{{ $profile->email }}" class="text-blue-500">{{ $profile->email }}</a></li>
                                        @endif
                                        @if($profile->phone_number)
                                            <li class="flex items-center"><i class="fas fa-phone mr-2"></i><a href="tel:{{ $profile->phone_number }}" class="text-blue-500">{{ $profile->phone_number }}</a></li>
                                        @endif
                                        @if($profile->github_link)
                                            <li class="flex items-center"><i class="fab fa-github mr-2"></i><a href="{{ $profile->github_link }}" class="text-blue-500">{{ $profile->github_link }}</a></li>
                                        @endif
                                        @if($profile->linkedin_link)
                                            <li class="flex items-center"><i class="fab fa-linkedin mr-2"></i><a href="{{ $profile->linkedin_link }}" class="text-blue-500">{{ $profile->linkedin_link }}</a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>

                            <!-- Right Side: Experience, Education, Skills, Languages, Hobbies -->
                            <div class="md:w-1/2 md:pl-6">
                                <div class="mt-4 md:mt-0">
                                    <h2 class="text-lg font-semibold">Experience</h2>
                                    <div class="text-gray-600">
                                        <p><strong>Company:</strong> {{ $profile->company_name }}</p>
                                        <p><strong>Position:</strong> {{ $profile->position_held }} <span class="ml-2">({{ $profile->startWork_year }} - {{ $profile->endWork_year }})</span></p>
                                        <p><strong>Roles:</strong> {{ $profile->roles }}</p>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <h2 class="text-lg font-semibold">Education</h2>
                                    <div class="text-gray-600">
                                        <p><strong>Institution:</strong> {{ $profile->institution_name }}</p>
                                        <p><strong>Course:</strong> {{ $profile->course_done }} <span class="ml-2">({{ $profile->startCourse_year }} - {{ $profile->endCourse_year }})</span></p>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <h2 class="text-lg font-semibold">Skills</h2>
                                    <div class="flex flex-wrap">
                                        @foreach($profile->skills as $skill)
                                            <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded mr-2 mb-2">{{ $skill }}</span>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <h2 class="text-lg font-semibold">Languages</h2>
                                    <div class="flex flex-wrap">
                                        @foreach($profile->languages as $language)
                                            <span class="bg-green-100 text-green-800 px-2 py-1 rounded mr-2 mb-2">{{ $language }}</span>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <h2 class="text-lg font-semibold">Hobbies</h2>
                                    <div class="flex flex-wrap">
                                        @foreach($profile->hobbies as $hobby)
                                            <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded mr-2 mb-2">{{ $hobby }}</span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout> --}}
