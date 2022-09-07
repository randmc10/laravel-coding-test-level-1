<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index');
});

Route::controller(EventController::class)->group(function(){ 
    Route::get('/events', 'index');  
    Route::get('/events/create','create');
    Route::get('/events/datatables', 'generateDatatables'); 
    Route::post('/store', 'store');
    Route::get('/events/{id}', 'show');
    Route::get('/event/{id}/edit', 'edit');
    Route::put('/events/{event}', 'update');
    Route::delete('/events/{id}', 'destroy');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
