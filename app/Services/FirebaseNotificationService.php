<?php

namespace App\Services;

use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;

class FirebaseNotificationService
{
    protected $messaging;

    public function __construct()
    {
        $factory = (new Factory)
            ->withServiceAccount(storage_path('app/firebase/firebase.json'));

        $this->messaging = $factory->createMessaging();
    }

public function send($token, $title, $body)
{
    $message = CloudMessage::new()
        ->withToken($token)
        ->withNotification(
            Notification::create($title, $body)
        )
        ->withData([
            'type' => 'general',
        ]);

    return $this->messaging->send($message);
}

public function sendNotification(string $title, string $description, string $fcmToken)
{
    $message = \Kreait\Firebase\Messaging\CloudMessage::new()
        ->toToken($fcmToken)
        ->withNotification(
            \Kreait\Firebase\Messaging\Notification::create($title, $description)
        )
        ->withData([
            'title' => $title,
            'description' => $description,
        ]);

    return $this->messaging->send($message);
}
}