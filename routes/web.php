<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\RegistrationController;

Route::get('/register/create', [RegistrationController::class, 'create'])->name('registrations.create');

// Route to process the submitted form data
Route::post('/register', [RegistrationController::class, 'store'])->name('registrations.store');
