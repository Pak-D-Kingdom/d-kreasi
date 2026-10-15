<?php

use App\Http\Controllers\Api\AiChatController;
use Illuminate\Support\Facades\Route;

Route::prefix('ai')->name('ai.')->group(function () {
    Route::post('/chat', [AiChatController::class, 'chat'])
        ->middleware('throttle:60,1')
        ->name('chat');
});
