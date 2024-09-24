<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\GradesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendance.index');
});
Route::middleware('auth')->group(function () {
    Route::get('/grades', [GradesController::class, 'index'])->name('grades.index');
    Route::get('/grades/create', [GradesController::class, 'create'])->name('grades.create');
    Route::post('/grades', [GradesController::class, 'store'])->name('grades.store');
    Route::get('/grades/{id}/edit', [GradesController::class, 'edit'])->name('grades.edit');
    Route::patch('/grades/{id}', [GradesController::class, 'update'])->name('grades.update');
    Route::delete('/grades/{id}', [GradesController::class, 'destroy'])->name('grades.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/subject', [SubjectController::class, 'index'])->name('subject.index');
    Route::get('/subject/create', [SubjectController::class, 'create'])->name('subject.create');
    Route::post('/subject', [SubjectController::class, 'store'])->name('subject.store');
    Route::get('/subject/{id}/edit', [SubjectController::class, 'edit'])->name('subject.edit');
    Route::patch('/subject/{id}', [SubjectController::class, 'update'])->name('subject.update');
    Route::delete('/subject/{id}', [SubjectController::class, 'destroy'])->name('subject.destroy');
});

require __DIR__ . '/auth.php';
