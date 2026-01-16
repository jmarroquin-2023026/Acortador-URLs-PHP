<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\URLsController;


Route::get('/view',[URLsController::class, 'index']);
Route::post('/create',[URLsController::class,'store']);
Route::get('/search/{shorten_url}',[URLsController::class,'show']);
Route::delete('/delete/{id}',[URLsController::class,'destroy']);
Route::put('/update/{id}',[URLsController::class,'update']);
Route::get('/{shorten_url}',[URLsController::class,'redirect']);