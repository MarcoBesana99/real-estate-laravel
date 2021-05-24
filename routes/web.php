<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PropertyController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => 'auth'], function() {
    Route::group(['middleware' => 'role:agent', 'prefix' => 'agent', 'as' => 'agent.'], function() {
        Route::resource('properties', PropertyController::class)->except([
            'show'
        ]);
    });
});

Route::get('properties/property/{property}', [PropertyController::class, 'show'])->name('show.property');
Route::get('properties', [PropertyController::class, 'filter'])->name('filter');