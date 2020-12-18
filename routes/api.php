<?php

use App\Http\Controllers\API\PlayerController;
use App\Http\Controllers\API\TeamsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    })->name('user');
    
    Route::get('/players', [PlayerController::class, 'index'])->name('players');
    Route::post('/players', [PlayerController::class, 'store'])->name('players.store');
    Route::patch('/players/{player:id}', [PlayerController::class, 'update'])->name('players.update');
    Route::delete('/players/{player:id}', [PlayerController::class, 'destroy'])->name('players.destroy');

    Route::get('/teams', [TeamsController::class, 'index'])->name('teams');
    Route::post('/teams', [TeamsController::class, 'store'])->name('teams.store');
    Route::patch('/teams/{team:id}', [TeamsController::class, 'update'])->name('teams.update');
    Route::delete('/teams/{team:id}', [TeamsController::class, 'destroy'])->name('teams.destroy');
});
