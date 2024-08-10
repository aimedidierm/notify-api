<?php

use App\Http\Controllers\TodoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('todos', TodoController::class)->only('index', 'store', 'show', 'destroy');

Route::get('/test', function () {

    $factory = (new Factory)
        ->withServiceAccount(config('filesystems.disks.local.root') . '/' . env('FIREBASE_CREDENTIALS'));

    $messaging = $factory->createMessaging();

    $notification = Notification::create('Test Title', 'Test Body');
    $message = CloudMessage::withTarget('topic', 'todos')
        ->withNotification($notification);

    $messaging->send($message);
});
