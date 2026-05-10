<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoanController;

Route::get('books/{id}', [BookController::class, 'show']);
Route::get('books', [BookController::class, 'index']);
Route::delete('books/{id}', [BookController::class, 'delete']);
Route::post('books', [BookController::class, 'store']);
Route::put('books/{id}', [BookController::class, 'update']);

Route::get('loans/{id}', [LoanController::class, 'show']);
Route::get('loans', [LoanController::class, 'index']);
Route::delete('loans/{id}', [LoanController::class, 'delete']);
Route::put('loans/{id}', [LoanController::class, 'update']);