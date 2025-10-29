    <?php
    // use Illuminate\Support\Facades\Route;
    // use App\Http\Controllers\EventController;
    // use App\Http\Controllers\SpeakerController;
    // use App\Http\Controllers\SessionController;

    // Route::get('/', [EventController::class, 'index'])->name('home');
    // Route::resource('events', EventController::class);

    // // Speakers routes
    // Route::get('events/{event}/speakers/create', [SpeakerController::class, 'create'])->name('speakers.create');
    // Route::post('events/{event}/speakers', [SpeakerController::class, 'store'])->name('speakers.store');

    // // Sessions routes
    // Route::get('events/{event}/sessions/create', [SessionController::class, 'create'])->name('sessions.create');
    // Route::post('events/{event}/sessions', [SessionController::class, 'store'])->name('sessions.store');


    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\EventController;
    use App\Http\Controllers\SpeakerController;
    use App\Http\Controllers\SessionController;

    // Home
    Route::get('/', [EventController::class, 'index'])->name('home');

    // Events resource
    Route::resource('events', EventController::class);


    // Speakers routes (nested under events)
    Route::get('events/{event}/speakers/create', [SpeakerController::class, 'create'])->name('speakers.create');
    Route::post('events/{event}/speakers', [SpeakerController::class, 'store'])->name('speakers.store');

    // Sessions routes (nested under events)
    Route::get('events/{event}/sessions/create', [SessionController::class, 'create'])->name('sessions.create');
    Route::post('events/{event}/sessions', [SessionController::class, 'store'])->name('sessions.store');


    Route::get('/speakers/{speaker}', [SpeakerController::class, 'show'])->name('speakers.show');
    // Edit speaker form
    Route::get('/speakers/{speaker}/edit', [SpeakerController::class, 'edit'])->name('speakers.edit');

    // Update speaker
    Route::put('/speakers/{speaker}', [SpeakerController::class, 'update'])->name('speakers.update');
    
    // Delete speaker (if not already defined)
    Route::delete('/speakers/{speaker}', [SpeakerController::class, 'destroy'])->name('speakers.destroy');




    Route::get('events/{event}/sessions/create', [SessionController::class, 'create'])->name('sessions.create');
    Route::post('events/{event}/sessions', [SessionController::class, 'store'])->name('sessions.store');
    Route::get('sessions/{session}/edit', [SessionController::class, 'edit'])->name('sessions.edit');
    Route::put('sessions/{session}', [SessionController::class, 'update'])->name('sessions.update');
    Route::delete('sessions/{session}', [SessionController::class, 'destroy'])->name('sessions.destroy');

