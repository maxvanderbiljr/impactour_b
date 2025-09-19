<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Livewire\ShowCommunityPage;
use App\Livewire\ShowCommunity;

Route::get('/', function () {
    return view('livewire.home');
})->name('inicio');

Route::get('/participar', [RegisterController::class, 'showRegistrationForm'])->name('participar');
Route::post('/participar', [RegisterController::class, 'register']);

Route::get('/communities', ShowCommunityPage::class)->name('comunidades');
Route::get('/community/{id}', ShowCommunity::class)->name('comunidade');