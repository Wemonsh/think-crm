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

Route::get('/', [\App\Http\Controllers\MainController::class, 'index'])
    ->name('index');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::prefix('document-flow')->group(function () {

    Route::prefix('correspondent')->group(function () {
        Route::get('/response', [\App\Http\Controllers\DocumentCorrespondentController::class, 'response'])->name('correspondent.response');
        Route::get('/', [\App\Http\Controllers\DocumentCorrespondentController::class, 'index'])->name('correspondent.index');
        Route::get('/create', [\App\Http\Controllers\DocumentCorrespondentController::class, 'create'])->name('correspondent.create');
        Route::post('/store', [\App\Http\Controllers\DocumentCorrespondentController::class, 'store'])->name('correspondent.store');
        Route::get('/edit/{id}', [\App\Http\Controllers\DocumentCorrespondentController::class, 'edit'])->name('correspondent.edit');
        Route::post('/update/{id}', [\App\Http\Controllers\DocumentCorrespondentController::class, 'update'])->name('correspondent.update');
        Route::get('/show/{id}', [\App\Http\Controllers\DocumentCorrespondentController::class, 'show'])->name('correspondent.show');
        Route::get('/destroy/{id}', [\App\Http\Controllers\DocumentCorrespondentController::class, 'destroy'])->name('correspondent.destroy');
    });

    Route::prefix('importance')->group(function () {
        Route::get('/response', [\App\Http\Controllers\DocumentImportanceController::class, 'response'])->name('importance.response');
        Route::get('/', [\App\Http\Controllers\DocumentImportanceController::class, 'index'])->name('importance.index');
        Route::get('/create', [\App\Http\Controllers\DocumentImportanceController::class, 'create'])->name('importance.create');
        Route::post('/store', [\App\Http\Controllers\DocumentImportanceController::class, 'store'])->name('importance.store');
        Route::get('/edit/{id}', [\App\Http\Controllers\DocumentImportanceController::class, 'edit'])->name('importance.edit');
        Route::post('/update/{id}', [\App\Http\Controllers\DocumentImportanceController::class, 'update'])->name('importance.update');
        Route::get('/show/{id}', [\App\Http\Controllers\DocumentImportanceController::class, 'show'])->name('importance.show');
        Route::get('/destroy/{id}', [\App\Http\Controllers\DocumentImportanceController::class, 'destroy'])->name('importance.destroy');
    });

    Route::prefix('type')->group(function () {
        Route::get('/response', [\App\Http\Controllers\DocumentTypeController::class, 'response'])->name('type.response');
        Route::get('/', [\App\Http\Controllers\DocumentTypeController::class, 'index'])->name('type.index');
        Route::get('/create', [\App\Http\Controllers\DocumentTypeController::class, 'create'])->name('type.create');
        Route::post('/store', [\App\Http\Controllers\DocumentTypeController::class, 'store'])->name('type.store');
        Route::get('/edit/{id}', [\App\Http\Controllers\DocumentTypeController::class, 'edit'])->name('type.edit');
        Route::post('/update/{id}', [\App\Http\Controllers\DocumentTypeController::class, 'update'])->name('type.update');
        Route::get('/show/{id}', [\App\Http\Controllers\DocumentTypeController::class, 'show'])->name('type.show');
        Route::get('/destroy/{id}', [\App\Http\Controllers\DocumentTypeController::class, 'destroy'])->name('type.destroy');
    });

    Route::prefix('incoming')->group(function () {
        Route::get('/response', [\App\Http\Controllers\DocumentIncomingController::class, 'response'])->name('incoming.response');
        Route::get('/', [\App\Http\Controllers\DocumentIncomingController::class, 'index'])->name('incoming.index');
        Route::get('/create', [\App\Http\Controllers\DocumentIncomingController::class, 'create'])->name('incoming.create');
        Route::post('/store', [\App\Http\Controllers\DocumentIncomingController::class, 'store'])->name('incoming.store');
        Route::get('/edit/{id}', [\App\Http\Controllers\DocumentIncomingController::class, 'edit'])->name('incoming.edit');
        Route::post('/update/{id}', [\App\Http\Controllers\DocumentIncomingController::class, 'update'])->name('incoming.update');
        Route::get('/show/{id}', [\App\Http\Controllers\DocumentIncomingController::class, 'show'])->name('incoming.show');
        Route::get('/destroy/{id}', [\App\Http\Controllers\DocumentIncomingController::class, 'destroy'])->name('incoming.destroy');
    });

    Route::prefix('outgoing')->group(function () {
        Route::get('/response', [\App\Http\Controllers\DocumentOutgoingController::class, 'response'])->name('outgoing.response');
        Route::get('/', [\App\Http\Controllers\DocumentOutgoingController::class, 'index'])->name('outgoing.index');
        Route::get('/create', [\App\Http\Controllers\DocumentOutgoingController::class, 'create'])->name('outgoing.create');
        Route::post('/store', [\App\Http\Controllers\DocumentOutgoingController::class, 'store'])->name('outgoing.store');
        Route::get('/edit/{id}', [\App\Http\Controllers\DocumentOutgoingController::class, 'edit'])->name('outgoing.edit');
        Route::post('/update/{id}', [\App\Http\Controllers\DocumentOutgoingController::class, 'update'])->name('outgoing.update');
        Route::get('/show/{id}', [\App\Http\Controllers\DocumentOutgoingController::class, 'show'])->name('outgoing.show');
        Route::get('/destroy/{id}', [\App\Http\Controllers\DocumentOutgoingController::class, 'destroy'])->name('outgoing.destroy');
    });
});
