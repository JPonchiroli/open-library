<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('books/{id}', [BookController::class, 'show']);
Route::get('books', [BookController::class, 'index']);
Route::delete('books/{id}', [BookController::class, 'delete']);
Route::post('books', [BookController::class, 'store']);
Route::put('books/{id}', [BookController::class, 'update']);