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


Route::prefix('department')->group(function () {
    Route::get('/response', [\App\Http\Controllers\Core\DepartmentController::class, 'response'])
        ->name('department.response');

    Route::get('/', [\App\Http\Controllers\Core\DepartmentController::class, 'index'])
        ->name('department.index');

    Route::get('/create', [\App\Http\Controllers\Core\DepartmentController::class, 'create'])
        ->name('department.create');

    Route::post('/store', [\App\Http\Controllers\Core\DepartmentController::class, 'store'])
        ->name('department.store');

    Route::get('/edit/{id}', [\App\Http\Controllers\Core\DepartmentController::class, 'edit'])
        ->name('department.edit');

    Route::post('/update/{id}', [\App\Http\Controllers\Core\DepartmentController::class, 'update'])
        ->name('department.update');

    Route::get('/show/{id}', [\App\Http\Controllers\Core\DepartmentController::class, 'show'])
        ->name('department.show');

    Route::get('/destroy/{id}', [\App\Http\Controllers\Core\DepartmentController::class, 'destroy'])
        ->name('department.destroy');
});

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

        Route::get('/edit/{id}', [\App\Http\Controllers\DocumentFlow\JournalController::class, 'edit'])
            ->name('journal.edit');

        Route::post('/update/{id}', [\App\Http\Controllers\DocumentFlow\JournalController::class, 'update'])
            ->name('journal.update');

        Route::get('/show/{id}', [\App\Http\Controllers\DocumentFlow\JournalController::class, 'show'])
            ->name('journal.show');

        Route::get('/destroy/{id}', [\App\Http\Controllers\DocumentFlow\JournalController::class, 'destroy'])
            ->name('journal.destroy');
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

        Route::get('/show/{id}/file-attach', [\App\Http\Controllers\DocumentFlow\DocumentController::class, 'file_attach'])
            ->name('document.file-attach');

        Route::post('/show/{id}/file-store', [\App\Http\Controllers\DocumentFlow\DocumentController::class, 'file_store'])
            ->name('document.file-store');
    });

    Route::prefix('counterparty')->group(function () {
        Route::get('/response', [\App\Http\Controllers\DocumentFlow\CounterpartyController::class, 'response'])
            ->name('counterparty.response');

        Route::get('/', [\App\Http\Controllers\DocumentFlow\CounterpartyController::class, 'index'])
            ->name('counterparty.index');

        Route::get('/create', [\App\Http\Controllers\DocumentFlow\CounterpartyController::class, 'create'])
            ->name('counterparty.create');

        Route::post('/store', [\App\Http\Controllers\DocumentFlow\CounterpartyController::class, 'store'])
            ->name('counterparty.store');

        Route::get('/edit/{id}', [\App\Http\Controllers\DocumentFlow\CounterpartyController::class, 'edit'])
            ->name('counterparty.edit');

        Route::post('/update/{id}', [\App\Http\Controllers\DocumentFlow\CounterpartyController::class, 'update'])
            ->name('counterparty.update');

        Route::get('/show/{id}', [\App\Http\Controllers\DocumentFlow\CounterpartyController::class, 'show'])
            ->name('counterparty.show');

        Route::get('/destroy/{id}', [\App\Http\Controllers\DocumentFlow\CounterpartyController::class, 'destroy'])
            ->name('counterparty.destroy');
    });
});
