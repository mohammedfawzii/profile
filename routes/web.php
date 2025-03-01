<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
Route::post('/profile/update/{id}', [ProfileController::class, 'update'])->name('profile.update');
