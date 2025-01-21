@extends('layouts.auth')

@section('title', 'Login')

@section('content')
<div class="w-full max-w-md">
    <div class="bg-[#1a1f36] shadow-lg rounded-lg p-8">
        <!-- Logo -->
        <div class="mb-8 flex justify-center">
            <h1 class="text-2xl font-bold text-white">SageRTC</h1>
        </div>

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <div>
                <label for="email" class="block text-sm font-medium text-gray-300">
                    Email
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

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input type="checkbox" name="remember" id="remember"
                           class="h-4 w-4 rounded bg-[#2e3856] border-gray-700 text-blue-500 focus:ring-blue-500">
                    <label for="remember" class="ml-2 block text-sm text-gray-300">
                        Remember me
                    </label>
                </div>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}"
                       class="text-sm text-gray-300 hover:text-blue-400 transition-colors">
                        Forgot password?
                    </a>
                @endif
            </div>

            <button type="submit"
                    class="w-full flex justify-center py-2.5 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                Sign in
            </button>
        </form>

        <div class="mt-6 text-center">
            <p class="text-sm text-gray-400">
                Don't have an account?
                <a href="{{ route('register') }}" 
                   class="font-medium text-blue-400 hover:text-blue-300 transition-colors">
                    Sign up
                </a>
            </p>
        </div>
    </div>
</div>
@endsection
