<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\RegistrationController;
use App\Models\Course;
use App\Models\CourseRegistration;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function (Request $request) {
    $user = $request->user();
    $role = $user->getRoleNames()->first() ?? 'member';

    return view('dashboard', [
        'roleLabel' => ucfirst($role),
        'totals' => [
            'students' => Student::count(),
            'courses' => Course::count(),
            'registrations' => CourseRegistration::count(),
        ],
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('students', StudentController::class);
    Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
    Route::get('/registrations', [RegistrationController::class, 'index'])->name('registrations.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/registrations/create', [RegistrationController::class, 'create'])->name('registrations.create');
    Route::post('/registrations', [RegistrationController::class, 'store'])->name('registrations.store');
});

require __DIR__.'/auth.php'; 