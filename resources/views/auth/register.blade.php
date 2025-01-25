@extends('layouts.auth')

@section('title', 'Register')

@section('content')
<div class="w-full max-w-md">
    <div class="bg-white dark:bg-dark-surface shadow-lg rounded-lg p-8 md:p-10 border border-gray-200 dark:border-gray-700">
        <!-- Logo -->
        <div class="mb-10 flex justify-center">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Create Account</h1>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-8">
            @csrf

            <div class="space-y-2">
                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Full name
                </label>
                <input type="text" name="name" id="name" required
                       class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-600 
                              bg-white dark:bg-dark-bg text-gray-900 dark:text-white 
                              placeholder-gray-400 dark:placeholder-gray-500
                              focus:border-blue-500 focus:ring-blue-500 
                              shadow-sm text-base py-2.5"
                       value="{{ old('name') }}"
                       placeholder="John Doe">
                @error('name')
                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="space-y-2">
                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Email address
                </label>
                <input type="email" name="email" id="email" required
                       class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-600 
                              bg-white dark:bg-dark-bg text-gray-900 dark:text-white 
                              placeholder-gray-400 dark:placeholder-gray-500
                              focus:border-blue-500 focus:ring-blue-500 
                              shadow-sm text-base py-2.5"
                       value="{{ old('email') }}"
                       placeholder="name@example.com">
                @error('email')
                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="space-y-2">
                <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Password
                </label>
                <input type="password" name="password" id="password" required
                       class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-600 
                              bg-white dark:bg-dark-bg text-gray-900 dark:text-white 
                              placeholder-gray-400 dark:placeholder-gray-500
                              focus:border-blue-500 focus:ring-blue-500 
                              shadow-sm text-base py-2.5"
                       placeholder="••••••••">
                @error('password')
                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="space-y-2">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Confirm password
                </label>
                <input type="password" name="password_confirmation" id="password_confirmation" required
                       class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-600 
                              bg-white dark:bg-dark-bg text-gray-900 dark:text-white 
                              placeholder-gray-400 dark:placeholder-gray-500
                              focus:border-blue-500 focus:ring-blue-500 
                              shadow-sm text-base py-2.5"
                       placeholder="••••••••">
            </div>

            <button type="submit"
                    class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm 
                           text-base font-medium text-white bg-blue-600 hover:bg-blue-700 
                           focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 
                           dark:focus:ring-offset-dark-surface transition-colors">
                Create account
            </button>
        </form>

        <div class="mt-8 text-center">
            <p class="text-sm text-gray-600 dark:text-gray-400">
                Already have an account?
                <a href="{{ route('login') }}" 
                   class="font-medium text-blue-600 dark:text-blue-400 hover:text-blue-500 dark:hover:text-blue-300 transition-colors">
                    Sign in
                </a>
            </p>
        </div>
    </div>
</div>
@endsection
