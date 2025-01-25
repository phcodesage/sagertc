<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <title>{{ config('app.name', 'SageRTC') }} - @yield('title')</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script>
        // Configure dark mode
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
    <!-- Navbar -->
    <nav class="bg-white dark:bg-dark-surface shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <a href="/" class="text-xl font-bold text-gray-900 dark:text-white">SageRTC</a>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    @auth
                        <a href="{{ route('dashboard') }}" 
                           class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                            Dashboard
                        </a>
                    @else
                        @unless(request()->routeIs('login'))
                            <a href="{{ route('login') }}" 
                               class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white 
                                      px-3 py-2 rounded-md text-sm font-medium">
                                Log in
                            </a>
                        @endunless
                        
                        @unless(request()->routeIs('register'))
                            <a href="{{ route('register') }}" 
                               class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium 
                                      rounded-md text-white bg-blue-600 hover:bg-blue-700 
                                      focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 
                                      dark:focus:ring-offset-dark-surface">
                                Register
                            </a>
                        @endunless
                    @endauth
                    @include('partials.theme-toggle')
                </div>
            </div>
        </div>
    </nav>

    <div class="min-h-[calc(100vh-4rem)] flex flex-col justify-center">
        <!-- Main Content -->
        <main class="flex-grow flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
            @yield('content')
        </main>
    </div>

    <script>
        // Check for saved theme preference, otherwise use system preference
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
            localStorage.theme = 'dark';
        } else {
            document.documentElement.classList.remove('dark');
            localStorage.theme = 'light';
        }

        // Theme toggle functionality
        const themeToggleBtn = document.getElementById('theme-toggle');
        const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');
        const themeDropdown = document.getElementById('theme-dropdown');

        // Update icons based on current theme
        function updateThemeIcons() {
            if (document.documentElement.classList.contains('dark')) {
                themeToggleDarkIcon.classList.add('hidden');
                themeToggleLightIcon.classList.remove('hidden');
            } else {
                themeToggleDarkIcon.classList.remove('hidden');
                themeToggleLightIcon.classList.add('hidden');
            }
        }

        // Initial icon state
        updateThemeIcons();

        // Toggle dropdown
        themeToggleBtn.addEventListener('click', () => {
            themeDropdown.classList.toggle('hidden');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', (e) => {
            if (!themeToggleBtn.contains(e.target) && !themeDropdown.contains(e.target)) {
                themeDropdown.classList.add('hidden');
            }
        });

        // Theme selection handlers
        document.querySelectorAll('[data-theme-value]').forEach(button => {
            button.addEventListener('click', () => {
                const theme = button.dataset.themeValue;
                localStorage.theme = theme;
                
                if (theme === 'dark') {
                    document.documentElement.classList.add('dark');
                } else {
                    document.documentElement.classList.remove('dark');
                }
                
                updateThemeIcons();
                themeDropdown.classList.add('hidden');
            });
        });
    </script>
</body>
</html> 