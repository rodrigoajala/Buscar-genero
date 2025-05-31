<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [RegisterController::class, 'showForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'submit'])->name('register.submit');
