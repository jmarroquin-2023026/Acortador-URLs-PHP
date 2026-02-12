<?php

use App\Http\Controllers\MetricExportController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\URLsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return redirect()->route('urls.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/view', [URLsController::class, 'index'])->name('urls.index');
    Route::post('/create', [URLsController::class, 'store'])->name('urls.store');
    Route::get('/show/{shorten_url}', [URLsController::class, 'show'])->name('urls.show');
    Route::put('/update/{id}', [URLsController::class, 'update'])->name('urls.update');
    Route::delete('/delete/{id}', [URLsController::class, 'destroy'])->name('urls.destroy');
    Route::get('/metrics', [URLsController::class, 'metrics'])->name('metrics.index');
    Route::get('/metrics/{shorten_url}', [URLsController::class, 'metricsDetails'])->name('metrics.show');
});

require __DIR__.'/auth.php';

Route::get('/{shorten_url}', [URLsController::class, 'redirect'])->name('urls.redirec')->middleware('track.metrics');

Route::post('/metrics/{url}/export', [MetricExportController::class, 'export'])
    ->middleware('auth')
    ->name('metrics.export');
