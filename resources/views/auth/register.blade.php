<x-guest-layout>
    <div class="max-w-md mx-auto mt-10 bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    {{ __('Name') }}
                </label>
                <input id="name" class="block mt-1 w-full border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm p-2 text-gray-900 dark:text-gray-200 bg-white dark:bg-gray-700 focus:ring-blue-500 focus:border-blue-500" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-600 dark:text-red-400" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    {{ __('Email') }}
                </label>
                <input id="email" class="block mt-1 w-full border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm p-2 text-gray-900 dark:text-gray-200 bg-white dark:bg-gray-700 focus:ring-blue-500 focus:border-blue-500" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600 dark:text-red-400" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    {{ __('Password') }}
                </label>
                <input id="password" class="block mt-1 w-full border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm p-2 text-gray-900 dark:text-gray-200 bg-white dark:bg-gray-700 focus:ring-blue-500 focus:border-blue-500" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600 dark:text-red-400" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    {{ __('Confirm Password') }}
                </label>
                <input id="password_confirmation" class="block mt-1 w-full border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm p-2 text-gray-900 dark:text-gray-200 bg-white dark:bg-gray-700 focus:ring-blue-500 focus:border-blue-500" type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-600 dark:text-red-400" />
            </div>

            <div class="flex items-center justify-between mt-6">
                <a class="text-sm text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-500 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 dark:focus:ring-blue-400" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <button type="submit" class="ml-3 bg-blue-600 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400">
                    {{ __('Register') }}
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>
