<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\URLsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', [URLsController::class, 'index']);
Route::get('/show/{shorten_url}',[URLsController::class,'show']);
Route::post('/create',[URLsController::class,'store']);
Route::put('/update/{id}',[URLsController::class, 'update']);
Route::delete('delete/{id}',[URLsController::class,'destroy']);