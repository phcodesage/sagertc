<!DOCTYPE html>
<html>
<head>
    <title>Test Stun/Turn Servers</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-50 min-h-screen font-[Inter]">
    <div class="max-w-7xl mx-auto p-6">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">WebRTC Connection Tester</h1>
            <p class="mt-2 text-gray-600">Test your STUN/TURN server configuration and connectivity</p>
        </div>

        <!-- Validation Messages -->
        <div id="validationMessages" class="mb-4 hidden">
            <div class="bg-red-50 border-l-4 border-red-400 p-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-red-700" id="validationText"></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Test Form -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <form id="testForm" class="space-y-6">
                    <!-- STUN Configuration -->
                    <div class="space-y-4">
                        <h3 class="text-lg font-medium text-gray-900">STUN Server Configuration</h3>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                STUN Server URL
                            </label>
                            <input type="text" id="stunUrl" 
                                   value="stun:stun.l.google.com:19302"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" 
                                   placeholder="stun:stun.example.com:19302">
                        </div>
                    </div>

                    <!-- TURN Configuration -->
                    <div class="space-y-4">
                        <h3 class="text-lg font-medium text-gray-900">TURN Server Configuration</h3>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">
                                    TURN Server URL
                                </label>
                                <input type="text" id="turnUrl" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" 
                                       placeholder="turn:turn.example.com:3478">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">
                                    Username
                                </label>
                                <input type="text" id="turnUsername" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" 
                                       placeholder="username">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">
                                    Credential
                                </label>
                                <input type="password" id="turnCredential" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" 
                                       placeholder="password">
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex justify-end space-x-4">
                        <button type="button" onclick="window.location.reload()" 
                                class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Reset
                        </button>
                        <button type="button" id="startTest"
                                class="px-4 py-2 border border-transparent rounded-md text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Start Test
                        </button>
                        <a href="/" 
                           class="px-4 py-2 border border-transparent rounded-md text-sm font-medium text-gray-600 hover:text-gray-900 focus:outline-none">
                            Back to Home
                        </a>
                    </div>
                </form>
            </div>

            <!-- Test Results -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <div class="space-y-6">
                    <h3 class="text-lg font-medium text-gray-900">Test Results</h3>
                    
                    <!-- Server Configuration Display -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            ICE Server Configuration
                        </label>
                        <pre id="ice" class="bg-gray-50 rounded-md p-4 text-sm font-mono overflow-auto max-h-48 border border-gray-200"></pre>
                    </div>

                    <!-- Status Indicators -->
                    <div class="space-y-4">
                        <div class="bg-gray-50 rounded-lg p-4">
                            <h3 class="text-sm font-medium text-gray-700 mb-2">Public IP Address</h3>
                            <p id="ip" class="text-sm text-gray-600">Waiting to start test...</p>
                        </div>

                        <div class="bg-gray-50 rounded-lg p-4">
                            <h3 class="text-sm font-medium text-gray-700 mb-2">STUN Server Status</h3>
                            <p id="stun" class="text-sm">
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                    Waiting to start test...
                                </span>
                            </p>
                        </div>

                        <div class="bg-gray-50 rounded-lg p-4">
                            <h3 class="text-sm font-medium text-gray-700 mb-2">TURN Server Status</h3>
                            <p id="turn" class="text-sm">
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                    Waiting to start test...
                                </span>
                            </p>
                        </div>

                        <div class="bg-gray-50 rounded-lg p-4">
                            <h3 class="text-sm font-medium text-gray-700 mb-2">Connection Status</h3>
                            <p id="err" class="text-sm text-gray-600">No errors reported</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const Ice = document.getElementById('ice');
        const IP = document.getElementById('ip');
        const Stun = document.getElementById('stun');
        const Turn = document.getElementById('turn');
        const Err = document.getElementById('err');
        let pc = null;

        function updateStatus(element, success, message) {
            const statusClass = success ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800';
            element.innerHTML = `<span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium ${statusClass}">${message}</span>`;
        }

        function validateInputs() {
            const stunUrl = document.getElementById('stunUrl').value;
            const turnUrl = document.getElementById('turnUrl').value;
            const turnUsername = document.getElementById('turnUsername').value;
            const turnCredential = document.getElementById('turnCredential').value;
            const validationMessages = document.getElementById('validationMessages');
            const validationText = document.getElementById('validationText');

            // Reset validation
            validationMessages.classList.add('hidden');

            // Validate STUN URL format
            if (!stunUrl.startsWith('stun:')) {
                validationText.textContent = 'STUN URL must start with "stun:"';
                validationMessages.classList.remove('hidden');
                return false;
            }

            // If TURN URL is provided, validate TURN credentials
            if (turnUrl) {
                if (!turnUrl.startsWith('turn:')) {
                    validationText.textContent = 'TURN URL must start with "turn:"';
                    validationMessages.classList.remove('hidden');
                    return false;
                }

                if (!turnUsername) {
                    validationText.textContent = 'TURN username is required when using a TURN server';
                    validationMessages.classList.remove('hidden');
                    return false;
                }

                if (!turnCredential) {
                    validationText.textContent = 'TURN credential is required when using a TURN server';
                    validationMessages.classList.remove('hidden');
                    return false;
                }
            }

            return true;
        }

        function startTest() {
            // Validate inputs first
            if (!validateInputs()) {
                return;
            }

            // Reset status
            IP.innerHTML = '<span class="text-gray-600">Detecting...</span>';
            updateStatus(Stun, false, 'Testing connection...');
            updateStatus(Turn, false, 'Testing connection...');
            Err.innerHTML = '<span class="text-gray-600">Testing in progress...</span>';

            // Close existing connection if any
            if (pc) {
                pc.close();
            }

            // Get values from inputs
            const stunUrl = document.getElementById('stunUrl').value;
            const turnUrl = document.getElementById('turnUrl').value;
            const turnUsername = document.getElementById('turnUsername').value;
            const turnCredential = document.getElementById('turnCredential').value;

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

            // Display configuration (with credential masked)
            const displayConfig = JSON.parse(JSON.stringify(iceServers));
            if (displayConfig[1]) {
                displayConfig[1].credential = '••••••••';
            }
            Ice.innerHTML = JSON.stringify(displayConfig, null, 4);

            try {
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
                        IP.innerHTML = `<span class="text-green-600">🟢 ${address}</span>`;
                        updateStatus(Stun, true, '🟢 STUN server is reachable');
                    }

                    if (e.candidate.type == 'relay' || e.candidate.candidate.includes('relay')) {
                        updateStatus(Turn, true, '🟢 TURN server is reachable');
                    }
                };

                pc.onicecandidateerror = (e) => {
                    console.error(e);
                    let errorMessage = e.errorText || 'Unknown error occurred';
                    if (errorMessage.includes('TURN')) {
                        updateStatus(Turn, false, '🔴 TURN server error');
                    }
                    Err.innerHTML = `<span class="text-red-600">🔴 Error: ${errorMessage}</span>`;
                };

                pc.createDataChannel('test');
                pc.createOffer()
                    .then(offer => pc.setLocalDescription(offer))
                    .catch(error => {
                        console.error('Error creating offer:', error);
                        Err.innerHTML = `<span class="text-red-600">🔴 Error creating connection: ${error.message}</span>`;
                    });

            } catch (error) {
                console.error('Error setting up WebRTC:', error);
                Err.innerHTML = `<span class="text-red-600">🔴 Error: ${error.message}</span>`;
            }
        }

        // Add event listener to start button
        document.getElementById('startTest').addEventListener('click', startTest);
    </script>
</body>
</html> 