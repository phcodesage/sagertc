<!DOCTYPE html>
<html>
<head>
    <title>SageRTC - TURN/STUN Testing Service</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen">
        <!-- Header -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold text-gray-900">SageRTC</h1>
            </div>
        </header>

        <!-- Main Content -->
        <main>
            <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <h2 class="text-2xl font-semibold text-gray-900 mb-4">
                            WebRTC TURN/STUN Testing Service
                        </h2>
                        <p class="text-gray-600 mb-6">
                            Test your TURN and STUN server connectivity with our easy-to-use testing tool.
                        </p>
                        <div class="space-y-4">
                            <div class="border-l-4 border-blue-500 bg-blue-50 p-4">
                                <div class="flex">
                                    <div class="ml-3">
                                        <p class="text-sm text-blue-700">
                                            Verify your WebRTC infrastructure with instant connectivity checks
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <a href="/turn-tester" 
                               class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Start Testing Now
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Features -->
                <div class="mt-12 grid gap-8 grid-cols-1 md:grid-cols-3">
                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                            <h3 class="text-lg font-medium text-gray-900">STUN Testing</h3>
                            <p class="mt-2 text-gray-600">
                                Verify STUN server connectivity and NAT traversal capabilities
                            </p>
                        </div>
                    </div>

                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                            <h3 class="text-lg font-medium text-gray-900">TURN Testing</h3>
                            <p class="mt-2 text-gray-600">
                                Confirm TURN relay functionality for fallback connectivity
                            </p>
                        </div>
                    </div>

                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                            <h3 class="text-lg font-medium text-gray-900">IP Detection</h3>
                            <p class="mt-2 text-gray-600">
                                Discover your public IP address through ICE candidates
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-white mt-12">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <p class="text-center text-gray-500 text-sm">
                    © 2024 SageRTC. All rights reserved.
                </p>
            </div>
        </footer>
    </div>
</body>
</html> 