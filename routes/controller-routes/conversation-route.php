<?php

use App\Http\Controllers\ConversationController;
use App\Models\Conversation;
use Illuminate\Support\Facades\Route;

Route::prefix('conversations')->group(function(){
    Route::prefix('rrps')->group(function(){
        Route::prefix('{rrpId}')->group(function(){
            Route::get('', [ConversationController::class, 'getRRPConversation']);
        });
    });

    Route::prefix('{conversationId}')->group(function(){
        Route::get('', [ConversationController::class, 'getConversation']);
    });
})

?>