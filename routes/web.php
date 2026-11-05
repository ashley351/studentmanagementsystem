<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
     return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/registrations/create', [RegistrationController::class, 'create'])->name('registrations.create');
    Route::post('/registrations', [RegistrationController::class, 'store'])->name('registrations.store');
});
Route::view('/', 'welcome')->name('index');
Route::view('/contact', 'contact')->name('contact');

require __DIR__.'/auth.php';