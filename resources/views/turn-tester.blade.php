<!DOCTYPE html>
<html>
<head>
    <title>Test Stun/Turn Servers</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <h1>Test Ice Servers</h1>
    <hr />
    <pre id='ice' style='overflow: auto'></pre>
    <hr />
    <p id='ip'></p>
    <p id='stun'>🔴 The STUN server is NOT reachable!</p>
    <p id='turn'>🔴 The TURN server is NOT reachable!</p>
    <p id='err'></p>
    <hr />

    <script>
        const Ice = document.getElementById('ice');
        const IP = document.getElementById('ip');
        const Stun = document.getElementById('stun');
        const Turn = document.getElementById('turn');
        const Err = document.getElementById('err');
        
        const iceServers = [
            // Test some STUN server
            {
                urls: 'stun:stun.l.google.com:19302',
            },
            // Test some TURN server
            {
                urls: 'turn:turnUrl',
                username: 'turnUsername',
                credential: 'turnPassword',
            },
        ];

        // Print iceServers config
        Ice.innerHTML = JSON.stringify(iceServers, null, 4);

        // Test the connections
        const pc = new RTCPeerConnection({
            iceServers
        });

        pc.onicecandidate = (e) => {
            if (!e.candidate) return;

            console.log(e.candidate.candidate);

            // If a srflx candidate was found, notify that the STUN server works!
            if (e.candidate.type == 'srflx' || e.candidate.candidate.includes('srflx')) {
                let ip = /\b\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\b/;
                let address = e.candidate.address 
                    ? e.candidate.address 
                    : e.candidate.candidate.match(ip);
                IP.innerHTML = '🟢 Your Public IP Address is ' + address;
                Stun.innerHTML = '🟢 The STUN server is reachable!';
            }

            // If a relay candidate was found, notify that the TURN server works!
            if (e.candidate.type == 'relay' || e.candidate.candidate.includes('relay')) {
                Turn.innerHTML = '🟢 The TURN server is reachable!';
            }
        };

        // handle error
        pc.onicecandidateerror = (e) => {
            console.error(e);
            Err.innerHTML = '🔴 Error: ' + e.errorText;
        };

        pc.createDataChannel('test');
        pc.createOffer().then(offer => pc.setLocalDescription(offer));
    </script>
</body>
</html> 