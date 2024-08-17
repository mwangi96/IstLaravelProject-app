<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Job Portal</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

        <!-- Styles -->
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

        <style>
            .marquee {
                overflow: hidden;
                position: relative;
                background-color: green;
                color: #ffffff;
                padding: 1rem 0;
                white-space: nowrap;
            }

            .marquee p {
                display: inline-block;
                animation: scroll 15s linear infinite;
            }

            @keyframes scroll {
                0% {
                    transform: translateX(100%);
                }
                100% {
                    transform: translateX(-100%);
                }
            }
        </style>
    </head>
    <body class="font-sans antialiased flex flex-col min-h-screen">
        <!-- Marquee at the top -->
        <div class="marquee">
            <p>Welcome to Our Job Portal - Connecting Talented Professionals with Top Employers!</p>
        </div>

        <!-- Navigation -->
        @include('layouts.navigation')


        <!-- Page Heading -->
        @isset($header)
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endisset

        <!-- Main Content -->
        <div class="container mx-auto">
            @yield('content')
        </div>

        <main class="flex-grow">
            <div class="max-w-7xl mx-auto p-6 lg:p-8">
                {{-- {{ $slot }} --}}
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-red-800 text-white py-4">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between">
                    <!-- Logo in Footer -->
                    <div class="flex items-center">
                        <img src="{{ asset('storage/images/image.png') }}" class="h-8 w-auto" alt="Logo">
                        <p class="text-sm ml-4">&copy; {{ date('Y') }} Your Company. All rights reserved.</p>
                    </div>
                    <!-- Footer Links -->
                    <div class="space-x-4">
                        <a href="#" class="hover:text-gray-400">Privacy Policy</a>
                        <a href="#" class="hover:text-gray-400">Terms of Service</a>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Scripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script>
        @if(Session::has('success'))
            toastr.success("{{ Session::get('success') }}");
        @endif

        @if(Session::has('error'))
            toastr.error("{{ Session::get('error') }}");
        @endif
        </script>
    </body>
</html>
