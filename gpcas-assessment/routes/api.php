<?php

// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Api\EventApiController;
// use App\Http\Controllers\Api\SpeakerApiController;
// use App\Http\Controllers\Api\SessionApiController;

// Route::apiResource('events', EventApiController::class);
// Route::apiResource('speakers', SpeakerApiController::class);
// Route::apiResource('sessions', SessionApiController::class);

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EventApiController;
use App\Http\Controllers\Api\SpeakerApiController;
use App\Http\Controllers\Api\SessionApiController;

// Prefix all API routes with 'api' and give them unique names
Route::prefix('events')->name('api.events.')->group(function () {
    Route::get('/', [EventApiController::class, 'index'])->name('index');
    Route::post('/', [EventApiController::class, 'store'])->name('store');
    Route::get('{event}', [EventApiController::class, 'show'])->name('show');
    Route::put('{event}', [EventApiController::class, 'update'])->name('update');
    Route::delete('{event}', [EventApiController::class, 'destroy'])->name('destroy');
});

Route::prefix('speakers')->name('api.speakers.')->group(function () {
    Route::get('/', [SpeakerApiController::class, 'index'])->name('index');
    Route::post('/', [SpeakerApiController::class, 'store'])->name('store');
    Route::get('{speaker}', [SpeakerApiController::class, 'show'])->name('show');
    Route::put('{speaker}', [SpeakerApiController::class, 'update'])->name('update');
    Route::delete('{speaker}', [SpeakerApiController::class, 'destroy'])->name('destroy');
});

Route::prefix('sessions')->name('api.sessions.')->group(function () {
    Route::get('/', [SessionApiController::class, 'index'])->name('index');
    Route::post('/', [SessionApiController::class, 'store'])->name('store');
    Route::get('{session}', [SessionApiController::class, 'show'])->name('show');
    Route::put('{session}', [SessionApiController::class, 'update'])->name('update');
    Route::delete('{session}', [SessionApiController::class, 'destroy'])->name('destroy');
});
