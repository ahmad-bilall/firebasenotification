<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\FirebaseNotificationService;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function send(Request $request, FirebaseNotificationService $firebase)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'fcm_token' => 'required|string',
        ]);

        $firebase->sendNotification(
            $request->title,
            $request->description,
            $request->fcm_token
        );

        return response()->json([
            'status' => true,
            'message' => 'Notification sent successfully.'
        ]);
    }
}