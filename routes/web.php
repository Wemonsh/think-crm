<?php

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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::prefix('document-flow')->group(function () {
    Route::prefix('journal')->group(function () {
        Route::get('/response', [\App\Http\Controllers\DocumentFlow\JournalController::class, 'response'])
            ->name('journal.response');

        Route::get('/', [\App\Http\Controllers\DocumentFlow\JournalController::class, 'index'])
            ->name('journal.index');

        Route::get('/create', [\App\Http\Controllers\DocumentFlow\JournalController::class, 'create'])
            ->name('journal.create');

        Route::post('/store', [\App\Http\Controllers\DocumentFlow\JournalController::class, 'store'])
            ->name('journal.store');
    });

    Route::prefix('document')->group(function () {
        Route::get('/response', [\App\Http\Controllers\DocumentFlow\DocumentController::class, 'response'])
            ->name('document.response');

        Route::get('/', [\App\Http\Controllers\DocumentFlow\DocumentController::class, 'index'])
            ->name('document.index');

        Route::get('/create', [\App\Http\Controllers\DocumentFlow\DocumentController::class, 'create'])
            ->name('document.create');

        Route::post('/store', [\App\Http\Controllers\DocumentFlow\DocumentController::class, 'store'])
            ->name('document.store');

        Route::get('/show/{id}', [\App\Http\Controllers\DocumentFlow\DocumentController::class, 'show'])
            ->name('document.show');

        Route::get('/attach/{id}', [\App\Http\Controllers\DocumentFlow\DocumentController::class, 'attach'])
            ->name('document.attach');
    });
});
