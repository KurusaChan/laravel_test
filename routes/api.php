<?php

use App\Http\Controllers\{CharacterController, EpisodeController, QuoteController};
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:api'])->group(function () {

    Route::group([
        'as'     => 'episodes.',
        'prefix' => 'episodes',
    ], function() {
        Route::get('/', [EpisodeController::class, 'all'])->name('all');
        Route::get('/{episode_id}', [EpisodeController::class, 'singleEpisode'])->name('singleEpisode');
    });

    Route::group([
        'as'     => 'characters.',
        'prefix' => 'characters',
    ], function() {
        Route::get('/', [CharacterController::class, 'all'])->name('all');
        Route::get('/random', [CharacterController::class, 'random'])->name('random');
    });

    Route::group([
        'as'     => 'quotes.',
        'prefix' => 'quotes',
    ], function() {
        Route::get('/', [QuoteController::class, 'all'])->name('all');
        Route::get('/random', [QuoteController::class, 'random'])->name('random');
    });

});
