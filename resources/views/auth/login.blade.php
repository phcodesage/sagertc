@extends('layouts.auth')

@section('title', 'Login')

@section('content')
<div class="w-full max-w-md">
    <div class="bg-[#1a1f36] shadow rounded-lg p-8">
        <!-- Logo -->

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <div>
                <label for="email" class="block text-sm font-medium text-gray-300">
                    Email
                </label>
                <input type="email" name="email" id="email" required
                       class="mt-1 block w-full rounded-md bg-[#2e3856] border-gray-700 text-white focus:border-blue-500 focus:ring-blue-500 text-sm"
                       value="{{ old('email') }}">
                @error('email')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-300">
                    Password
                </label>
                <input type="password" name="password" id="password" required
                       class="mt-1 block w-full rounded-md bg-[#2e3856] border-gray-700 text-white focus:border-blue-500 focus:ring-blue-500 text-sm">
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
                       class="text-sm text-gray-300 hover:text-blue-500">
                        Forgot your password?
                    </a>
                @endif
            </div>

            <button type="submit"
                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                LOG IN
            </button>
        </form>

        <!-- Registration Link -->
        <div class="mt-6 text-center">
            <a href="{{ route('register') }}" 
               class="text-sm text-gray-300 hover:text-blue-500">
                Don't have an account? Sign up
            </a>
        </div>
    </div>
</div>
@endsection
