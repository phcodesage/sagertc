<!DOCTYPE html>
<html lang="en" class="h-full bg-[#0f1424]">
<head>
    <title>{{ config('app.name', 'SageRTC') }} - @yield('title')</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'dark-bg': '#1a1f36',
                        'dark-input': '#2e3856',
                    }
                }
            }
        }
    </script>
</head>
<body class="min-h-screen font-[Inter] bg-[#0f1424]">
    <div class="min-h-screen flex flex-col justify-center">
        <!-- Main Content -->
        <main class="flex-grow flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
            @yield('content')
        </main>
    </div>
</body>
</html> 