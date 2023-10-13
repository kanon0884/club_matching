<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/',[EventController::class, 'index']);
    Route::get('/events',[EventController::class, 'event_index'])->name('events.index');
    Route::get('/events/search',[EventController::class, 'event_search']);
    Route::get('/events/search/results',[EventController::class,'event_results']);
    Route::get('/events/{event}',[EventController::class,'event_show']);
    Route::get('/event/create',[EventController::class,'event_create']);
    Route::post('/events',[EventController::class, 'event_store']);
    Route::get('/events/{event}/edit', [EventController::class, 'event_edit'])->middleware('check-event-authorization');
    Route::put('/events/{event}',[EventController::class, 'event_update']);
    Route::delete('/events/{event}', [EventController::class, 'delete']);

});

require __DIR__.'/auth.php';
