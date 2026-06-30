<?php

use Illuminate\Support\Facades\Route;
use App\Services\FirebaseNotificationService;

Route::get('/send-notification', function (FirebaseNotificationService $firebase) {

    $token = "ffYZ3dp0SPenI09W-5X_6B:APA91bEHGxyoWKr9ZpGNNZ65rSqqDemwQw3yxGlBQwYe63CRZWWOTx6YSfCS9v7fF2OkjnTlxGKX69bBMY340XgLUTUOTxUSO-HcM5J841-x8MSyJRHsEBk";

    $firebase->send(
        $token,
        "Laravel Notification",
        "Notification sent successfully!"
    );

    return "Notification Sent";
});

Route::get('/', function () {
    return view('welcome');
});
