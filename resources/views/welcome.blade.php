<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    @vite('resources/css/app.css')
</head>
<body class="bg-black text-gray-200 antialiased">
    <!-- Main Content -->
    <main class="relative flex items-center justify-center min-h-screen bg-black overflow-hidden">
        <!-- Background Video -->
        <video autoplay loop muted class="absolute top-0 left-0 w-full h-full object-cover opacity-60">
            <source src="{{ asset('storage/videos/VID-20240729-WA0033.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>

        <!-- Overlay Content -->
        <div class="relative z-10 text-center p-4 sm:p-8 md:p-12 lg:p-16 xl:p-20">
            <!-- Logo -->
            {{-- <div class="mb-6">
                <img src="{{ asset('storage/images/image.png') }}" alt="IST Alumni Management System Logo" class="mx-auto mb-6 w-32 h-24 md:w-40 md:h-32">
            </div> --}}
            <!-- Title -->
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-slate-400 mb-4 sm:mb-6">
                IST ALUMNI MANAGEMENT SYSTEM
            </h2>

            <!-- Sign Up Information -->
            <p class="text-base md:text-lg lg:text-xl text-gray-200 mb-6 sm:mb-8">
                Sign up to join our community of alumni or log in if you already have an account.
            </p>

            <!-- Buttons -->
            <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                <a href="{{ route('register') }}" class="bg-blue-600 text-white font-bold py-3 px-6 rounded-lg sm:py-3.5 sm:px-8 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition-colors">
                    Sign Up
                </a>
                <a href="{{ route('login') }}" class="bg-red-600 text-white font-bold py-3 px-6 rounded-lg sm:py-3.5 sm:px-8 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50 transition-colors">
                    Log In
                </a>
            </div>
        </div>
    </main>
</body>
</html>
