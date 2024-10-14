<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\GradesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserParentStudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard', \App\Http\Controllers\DashboardController::class)->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/users', [ProfileController::class, 'index'])->middleware(['auth'])->name('users.index');
Route::put('/users/{user}', [ProfileController::class, 'update_user'])->middleware(['auth'])->name('users.update');
Route::get('/users/{user}/edit', [ProfileController::class, 'edit_user'])->middleware(['auth'])->name('users.edit');
Route::get('/users/create', [ProfileController::class, 'create_user'])->middleware(['auth'])->name('users.create');
Route::post('/users', [ProfileController::class, 'store_user'])->middleware(['auth'])->name('users.store');
Route::delete('/users/{user}', [ProfileController::class, 'destroy_user'])->middleware(['auth'])->name('users.destroy');


Route::middleware('auth')->group(function () {
    Route::patch('/profile/updateRole', [ProfileController::class, 'updateRole'])->name('profile.updateRole');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::middleware('auth')->group(function () {
//     Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendance.index');
// });
Route::middleware('auth')->group(function () {
    Route::get('/grades', [GradesController::class, 'index'])->name('grades.index');
    Route::get('/grades/create', [GradesController::class, 'create'])->name('grades.create');
    Route::post('/grades', [GradesController::class, 'store'])->name('grades.store');
    Route::get('/grades/{id}/edit', [GradesController::class, 'edit'])->name('grades.edit');
    Route::patch('/grades/{id}', [GradesController::class, 'update'])->name('grades.update');
    Route::delete('/grades/{id}', [GradesController::class, 'destroy'])->name('grades.destroy');
});
Route::middleware('auth')->group(function () {
    Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendance.index');
    Route::get('/attendance/create', [AttendanceController::class, 'create'])->name('attendance.create');
    Route::post('/attendance', [AttendanceController::class, 'store'])->name('attendance.store');
    Route::get('/attendance/{id}/edit', [AttendanceController::class, 'edit'])->name('attendance.edit');
    Route::patch('/attendance/{id}', [AttendanceController::class, 'update'])->name('attendance.update');
    Route::delete('/attendance/{id}', [AttendanceController::class, 'destroy'])->name('attendance.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/subject', [SubjectController::class, 'index'])->name('subject.index');
    Route::get('/subject/create', [SubjectController::class, 'create'])->name('subject.create');
    Route::post('/subject', [SubjectController::class, 'store'])->name('subject.store');
    Route::get('/subject/{id}/edit', [SubjectController::class, 'edit'])->name('subject.edit');
    Route::patch('/subject/{id}', [SubjectController::class, 'update'])->name('subject.update');
    Route::delete('/subject/{id}', [SubjectController::class, 'destroy'])->name('subject.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/teacher', [UserParentStudentController::class, 'index'])->name('teacher.index');
    Route::get('/teacher/create', [UserParentStudentController::class, 'create'])->name('teacher.create');
    Route::post('/teacher', [SubjectController::class, 'store'])->name('teacher.store');
    Route::get('/teacher/{id}/edit', [SubjectController::class, 'edit'])->name('teacher.edit');
    Route::patch('/teacher/{id}', [SubjectController::class, 'update'])->name('teacher.update');
    Route::delete('/teacher/{id}', [SubjectController::class, 'destroy'])->name('teacher.destroy');
});

require __DIR__ . '/auth.php';
