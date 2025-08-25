<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return view('livewire.home');
})->name('home');

Route::get('/participar', [RegisterController::class, 'showRegistrationForm'])->name('participar');
Route::post('/participar', [RegisterController::class, 'register']);
