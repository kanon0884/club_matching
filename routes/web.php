<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/',[EventController::class, 'index']);
Route::get('/events',[EventController::class, 'event_index']);
Route::get('/events/{event}',[EventController::class,'event_show']);
Route::get('/event/create',[EventController::class,'event_create']);
Route::post('/events',[EventController::class, 'event_store']);
Route::get('/events/{event}/edit', [EventController::class, 'event_edit']);
Route::put('/events/{event}',[EventController::class, 'event_update']);
Route::delete('/events/{event}', [EventController::class, 'delete']);
