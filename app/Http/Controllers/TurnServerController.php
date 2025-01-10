<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TurnServerController extends Controller
{
    public function getCredentials()
    {
        // HMAC expiry timestamp - valid for the next 24 hours
        $expiry = time() + 24 * 3600; 
        
        // Username is timestamp
        $username = $expiry;
        
        // Get TURN server settings from environment variables
        $turnServer = env('TURN_SERVER_URL', 'turn:your-turn-server.com:3478');
        $turnSecret = env('TURN_SERVER_SECRET', 'your-static-auth-secret');
        
        // Generate credential using HMAC
        $credential = base64_encode(hash_hmac(
            'sha1',
            $username,
            $turnSecret,
            true
        ));

        return response()->json([
            'iceServers' => [
                [
                    'urls' => ['stun:stun.l.google.com:19302']
                ],
                [
                    'urls' => [$turnServer],
                    'username' => (string) $username,
                    'credential' => $credential
                ]
            ]
        ]);
    }
} 