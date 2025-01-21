@extends('layouts.auth')

@section('title', 'Register')

@section('content')
<div class="w-full max-w-md">
    <div class="bg-[#1a1f36] shadow-lg rounded-lg p-8">
        <!-- Logo -->
        <div class="mb-8 flex justify-center">
            <h1 class="text-2xl font-bold text-white">Create Account</h1>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-6">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium text-gray-300">
                    Name
                </label>
                <input type="text" name="name" id="name" required
                       class="mt-1 block w-full rounded-md bg-[#2e3856] border-gray-700 text-white placeholder-gray-400 focus:border-blue-500 focus:ring-blue-500 text-sm"
                       value="{{ old('name') }}"
                       placeholder="John Doe">
                @error('name')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-300">
                    Email address
                </label>
                <input type="email" name="email" id="email" required
                       class="mt-1 block w-full rounded-md bg-[#2e3856] border-gray-700 text-white placeholder-gray-400 focus:border-blue-500 focus:ring-blue-500 text-sm"
                       value="{{ old('email') }}"
                       placeholder="name@example.com">
                @error('email')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-300">
                    Password
                </label>
                <input type="password" name="password" id="password" required
                       class="mt-1 block w-full rounded-md bg-[#2e3856] border-gray-700 text-white placeholder-gray-400 focus:border-blue-500 focus:ring-blue-500 text-sm"
                       placeholder="••••••••">
                @error('password')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-300">
                    Confirm Password
                </label>
                <input type="password" name="password_confirmation" id="password_confirmation" required
                       class="mt-1 block w-full rounded-md bg-[#2e3856] border-gray-700 text-white placeholder-gray-400 focus:border-blue-500 focus:ring-blue-500 text-sm"
                       placeholder="••••••••">
            </div>

            <button type="submit"
                    class="w-full flex justify-center py-2.5 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                Create account
            </button>
        </form>

        <div class="mt-6 text-center">
            <p class="text-sm text-gray-400">
                Already have an account?
                <a href="{{ route('login') }}" 
                   class="font-medium text-blue-400 hover:text-blue-300 transition-colors">
                    Sign in
                </a>
            </p>
        </div>
    </div>
</div>
@endsection
