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

    Route::get('convo/check-exist', [ConversationController::class, 'checkIfExist']);

    Route::post('convo/create', [ConversationController::class, 'create']);

    Route::post('convo/delete', [ConversationController::class, 'delete']);

    Route::get('convo/check-new-message-by-user/{userId}', [ConversationController::class, 'checkNewMessageByUser']);

    Route::get('convo/check-new-message-by-rrp/{rrpId}', [ConversationController::class, 'checkNewMessageByRRP']);

    Route::get('convo/count-new-messages/{conversationId}/{userId}', [ConversationController::class, 'countNewMessages']);

    Route::post('message/mark-read', [ConversationController::class, 'markRead']);

    Route::get('get-convo-user-id/{userId}', [ConversationController::class, 'getConvoByUserID']);
});

?>