<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <title>Test Stun/Turn Servers</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
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
                <div class="flex items-center">
                    <!-- Dark mode toggle -->
                    <button id="theme-toggle" class="p-2 rounded-md text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700">
                        <!-- Sun icon -->
                        <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"/>
                        </svg>
                        <!-- Moon icon -->
                        <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto p-6">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">WebRTC Connection Tester</h1>
            <p class="mt-2 text-gray-600 dark:text-gray-400">Test your STUN/TURN server configuration and connectivity</p>
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Test Form -->
            <div class="bg-white dark:bg-dark-surface rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <form id="testForm" class="space-y-6">
                    <!-- STUN Configuration -->
                    <div class="space-y-4">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white">STUN Server Configuration</h3>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                STUN Server URL
                            </label>
                            <input type="text" id="stunUrl" 
                                   value="stun:stun.l.google.com:19302"
                                   class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm 
                                          bg-white dark:bg-dark-surface text-gray-900 dark:text-white
                                          focus:outline-none focus:ring-blue-500 focus:border-blue-500" 
                                   placeholder="stun:stun.example.com:19302">
                        </div>
                    </div>

                    <!-- TURN Configuration -->
                    <div class="space-y-4">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white">TURN Server Configuration</h3>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    TURN Server URL
                                </label>
                                <input type="text" id="turnUrl" 
                                       class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm 
                                              bg-white dark:bg-dark-surface text-gray-900 dark:text-white
                                              focus:outline-none focus:ring-blue-500 focus:border-blue-500" 
                                       placeholder="turn:turn.example.com:3478">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    Username
                                </label>
                                <input type="text" id="turnUsername" 
                                       class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm 
                                              bg-white dark:bg-dark-surface text-gray-900 dark:text-white
                                              focus:outline-none focus:ring-blue-500 focus:border-blue-500" 
                                       placeholder="username">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    Credential
                                </label>
                                <input type="password" id="turnCredential" 
                                       class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm 
                                              bg-white dark:bg-dark-surface text-gray-900 dark:text-white
                                              focus:outline-none focus:ring-blue-500 focus:border-blue-500" 
                                       placeholder="password">
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex justify-end space-x-4">
                        <button type="button" onclick="window.location.reload()" 
                                class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md text-sm font-medium 
                                       text-gray-700 dark:text-gray-300 bg-white dark:bg-dark-surface 
                                       hover:bg-gray-50 dark:hover:bg-gray-700">
                            Reset
                        </button>
                        <button type="button" id="startTest"
                                class="px-4 py-2 border border-transparent rounded-md text-sm font-medium 
                                       text-white bg-blue-600 hover:bg-blue-700">
                            Start Test
                        </button>
                    </div>
                </form>
            </div>

            <!-- Test Results -->
            <div class="bg-white dark:bg-dark-surface rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <div class="space-y-6">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white">Test Results</h3>
                    
                    <!-- Server Configuration Display -->
                    <div>
                        <div class="flex justify-between items-center mb-2">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                ICE Server Configuration
                            </label>
                            <button id="copyConfig" 
                                    class="inline-flex items-center px-2 py-1 text-xs font-medium text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white"
                                    title="Copy to clipboard">
                                <!-- Copy icon -->
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"/>
                                </svg>
                                <span class="ml-1">Copy</span>
                            </button>
                        </div>
                        <pre id="ice" class="bg-gray-50 dark:bg-gray-800 rounded-md p-4 text-sm font-mono overflow-auto max-h-48 
                                        border border-gray-200 dark:border-gray-700 
                                        text-gray-900 dark:text-white"></pre>
                    </div>

                    <!-- Status Indicators -->
                    <div class="space-y-4">
                        <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4">
                            <h3 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Public IP Address</h3>
                            <p id="ip" class="text-sm text-gray-600 dark:text-gray-400">Waiting to start test...</p>
                        </div>

                        <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4">
                            <h3 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">STUN Server Status</h3>
                            <p id="stun" class="text-sm">
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200">
                                    Waiting to start test...
                                </span>
                            </p>
                        </div>

                        <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4">
                            <h3 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">TURN Server Status</h3>
                            <p id="turn" class="text-sm">
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200">
                                    Waiting to start test...
                                </span>
                            </p>
                        </div>

                        <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4">
                            <h3 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Connection Status</h3>
                            <p id="err" class="text-sm text-gray-600 dark:text-gray-400">No errors reported</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Dark mode toggle functionality
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark')
        } else {
            document.documentElement.classList.remove('dark')
        }

        const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

        // Change the icons inside the button based on previous settings
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            themeToggleLightIcon.classList.remove('hidden');
        } else {
            themeToggleDarkIcon.classList.remove('hidden');
        }

        const themeToggleBtn = document.getElementById('theme-toggle');

        themeToggleBtn.addEventListener('click', function() {
            themeToggleDarkIcon.classList.toggle('hidden');
            themeToggleLightIcon.classList.toggle('hidden');
            
            if (localStorage.theme === 'dark') {
                localStorage.theme = 'light'
                document.documentElement.classList.remove('dark')
            } else {
                localStorage.theme = 'dark'
                document.documentElement.classList.add('dark')
            }
        });

        // Original test functionality
        const Ice = document.getElementById('ice');
        const IP = document.getElementById('ip');
        const Stun = document.getElementById('stun');
        const Turn = document.getElementById('turn');
        const Err = document.getElementById('err');
        let pc = null;

        function updateStatus(element, success, message) {
            const statusClass = success ? 'bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200' : 'bg-red-100 dark:bg-red-900 text-red-800 dark:text-red-200';
            element.innerHTML = `<span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium ${statusClass}">${message}</span>`;
        }

        document.getElementById('startTest').addEventListener('click', function() {
            // Get values from inputs
            const stunUrl = document.getElementById('stunUrl').value;
            const turnUrl = document.getElementById('turnUrl').value;
            const turnUsername = document.getElementById('turnUsername').value;
            const turnCredential = document.getElementById('turnCredential').value;

            // Reset status
            IP.innerHTML = '<span class="text-gray-600 dark:text-gray-400">Detecting...</span>';
            updateStatus(Stun, false, 'Testing connection...');
            updateStatus(Turn, false, 'Testing connection...');
            Err.innerHTML = '<span class="text-gray-600 dark:text-gray-400">Testing in progress...</span>';

            // Close existing connection if any
            if (pc) {
                pc.close();
            }

            // Configure ICE servers
            const iceServers = [
                {
                    urls: [stunUrl]
                }
            ];

            if (turnUrl) {
                iceServers.push({
                    urls: [turnUrl],
                    username: turnUsername,
                    credential: turnCredential
                });
            }

            // Display configuration
            Ice.innerHTML = JSON.stringify(iceServers, null, 4);

            // Create new connection
            pc = new RTCPeerConnection({ iceServers });

            pc.onicecandidate = (e) => {
                if (!e.candidate) return;

                console.log(e.candidate.candidate);

                if (e.candidate.type == 'srflx' || e.candidate.candidate.includes('srflx')) {
                    let ip = /\b\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\b/;
                    let address = e.candidate.address 
                        ? e.candidate.address 
                        : e.candidate.candidate.match(ip);
                    IP.innerHTML = `<span class="text-green-600 dark:text-green-400">🟢 ${address}</span>`;
                    updateStatus(Stun, true, '🟢 STUN server is reachable');
                }

                if (e.candidate.type == 'relay' || e.candidate.candidate.includes('relay')) {
                    updateStatus(Turn, true, '🟢 TURN server is reachable');
                }
            };

            pc.onicecandidateerror = (e) => {
                console.error(e);
                Err.innerHTML = `<span class="text-red-600 dark:text-red-400">🔴 Error: ${e.errorText}</span>`;
            };

            pc.createDataChannel('test');
            pc.createOffer().then(offer => pc.setLocalDescription(offer));
        });

        // Add input selection behavior
        const stunUrlInput = document.getElementById('stunUrl');
        stunUrlInput.addEventListener('focus', function(e) {
            if (e.target.value === 'stun:stun.l.google.com:19302') {
                e.target.select();
            }
        });

        // Add copy to clipboard functionality
        document.getElementById('copyConfig').addEventListener('click', async function() {
            const configText = document.getElementById('ice').textContent;
            try {
                await navigator.clipboard.writeText(configText);
                
                // Visual feedback
                const button = this;
                const originalContent = button.innerHTML;
                button.innerHTML = `
                    <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span class="ml-1 text-green-500">Copied!</span>
                `;
                
                // Reset after 2 seconds
                setTimeout(() => {
                    button.innerHTML = originalContent;
                }, 2000);
            } catch (err) {
                console.error('Failed to copy:', err);
                // Error feedback
                const button = this;
                const originalContent = button.innerHTML;
                button.innerHTML = `
                    <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                    <span class="ml-1 text-red-500">Failed to copy</span>
                `;
                
                // Reset after 2 seconds
                setTimeout(() => {
                    button.innerHTML = originalContent;
                }, 2000);
            }
        });
    </script>
</body>
</html> 