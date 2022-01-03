<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PopulatedPlaceController;
use App\Http\Controllers\ObjectTypeController;

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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Populated places start
Route::get('/populated_places', [PopulatedPlaceController::class, 'index'])->name('populated_places');
Route::get('/populated_place',[PopulatedPlaceController::class, 'add']);
Route::post('/populated_place',[PopulatedPlaceController::class, 'create']);
Route::get('/populated_place/{place}', [PopulatedPlaceController::class, 'edit']);
Route::post('/populated_place/{place}', [PopulatedPlaceController::class, 'update']);
// Populated places end

// Object types start
Route::get('/object_types', [ObjectTypeController::class, 'index'])->name('object_types');
Route::get('/object_type',[ObjectTypeController::class, 'add']);
Route::post('/object_type',[ObjectTypeController::class, 'create']);
Route::get('/object_type/{objectType}', [ObjectTypeController::class, 'edit']);
Route::post('/object_type/{objectType}', [ObjectTypeController::class, 'update']);
// Object types end
