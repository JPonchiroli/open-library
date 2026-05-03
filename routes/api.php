<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/users/{id}', [BookController::class, 'show']);
Route::get('/users', [BookController::class, 'index']);
Route::delete('/users/{id}', [BookController::class, 'delete']);
Route::post('/users', [BookController::class, 'store']);
Route::put('/users/{id}', [BookController::class, 'update']);