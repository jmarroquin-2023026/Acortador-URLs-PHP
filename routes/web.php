<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\URLsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [URLsController::class, 'dashboard']);
Route::post('/create',[URLsController::class,'store']);
Route::put('/update/{id}',[URLsController::class, 'update']);
Route::delete('delete/{id}',[URLsController::class,'destroy']);