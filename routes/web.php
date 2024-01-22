<?php

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

Route::get('/', [\App\Http\Controllers\Web\TeamController::class, 'index'])->name('home');
Route::prefix('games')->group(function () {
    Route::get('/', [\App\Http\Controllers\Web\GameController::class, 'index'])->name('games.index');
    Route::get('generate-fixture/', [\App\Http\Controllers\Web\GameController::class, 'generateFixture'])->name('games.generate-fixture');
});
