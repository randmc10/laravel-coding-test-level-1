<?php

use App\Http\Controllers\EventController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Event;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Return all events from the database
Route::get('/v1/events', [EventController::class, 'index']);

// Return all events that are active = current datetime is within startAt and endAt
Route::get('/v1/events/active-events', [EventController::class, 'getActiveEvents']);

//Get one event
Route::get('/v1/events/{id}', [EventController::class, 'show']);

//Search for an event
Route::get('/v1/events/search/{name}', [EventController::class, 'search']);

//Create an event
Route::post('/v1/events', [EventController::class, 'store']);

//Create event if not exist, else update the event in idempotent way
Route::put('/v1/events/{id}', [EventController::class, 'update']);

//Partially update event
Route::patch('/v1/events/{id}', [EventController::class, 'patch']);

//Soft delete an event
Route::delete('/v1/events/{id}', [EventController::class, 'destroy']);