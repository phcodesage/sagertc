<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <title>{{ config('app.name', 'SageRTC') }} - @yield('title')</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
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