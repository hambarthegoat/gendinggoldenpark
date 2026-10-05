<?php

use App\Http\Controllers\LandingController;
use App\Http\Controllers\LeadController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])->name('home');
Route::post('/kontak', [LeadController::class, 'store'])->name('leads.store');
