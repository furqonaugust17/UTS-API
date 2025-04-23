<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MovieController::class, 'index'])->name('index');
Route::get('/movie/{id}', [MovieController::class, 'detail'])->name('movie.detail');
Route::get('/search', [MovieController::class, 'search'])->name('search');
