<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <title>{{ config('app.name', 'SageRTC') }} - @yield('title')</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="{{ asset('js/theme.js') }}"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        'dark-bg': '#1a1b1e',
                        'dark-surface': '#25262b',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 dark:bg-dark-bg min-h-screen font-[Inter] transition-colors duration-200">
    <div class="min-h-screen flex flex-col">
        <!-- Header -->
        <nav class="bg-white dark:bg-dark-surface shadow">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <div class="flex-shrink-0 flex items-center">
                            <a href="/" class="text-xl font-bold text-gray-900 dark:text-white">SageRTC</a>
                        </div>
                    </div>
                    <div class="flex items-center">
                        @include('partials.theme-toggle')
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="flex-grow flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-white dark:bg-dark-surface">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <p class="text-center text-gray-500 dark:text-gray-400 text-sm">
                    © 2024 SageRTC. All rights reserved.
                </p>
            </div>
        </footer>
    </div>
</body>
</html> 