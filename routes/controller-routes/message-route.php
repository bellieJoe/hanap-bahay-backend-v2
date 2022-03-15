<?php

use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;

Route::prefix('messages')->group(function(){

    Route::post('create', [MessageController::class, 'addMessage']);

    Route::get('fetch-messages-by-conversation/{conversationId}', [MessageController::class, 'fetchMessagesByConversation']);

    Route::get('conversation-height/{conversationId}', [MessageController::class, 'getConversationHeight']);

});

?>