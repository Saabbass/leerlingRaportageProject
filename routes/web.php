<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GradesController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\UserParentStudentController;

use App\Http\Middleware\RoleMiddleware;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware(['auth', RoleMiddleware::class . ':teacher,parent,student'], 'verified')->group(function () {
    Route::get('/dashboard', \App\Http\Controllers\DashboardController::class)->name('dashboard');
});

Route::middleware(['auth', RoleMiddleware::class . ':teacher'])->group(function () {
    Route::get('/users', [ProfileController::class, 'index'])->name('users.index');
    Route::get('/users/{user}/details', [ProfileController::class, 'show_detail'])->name('users.studentDetail');
    Route::put('/users/{user}', [ProfileController::class, 'update_user'])->name('users.update');
    Route::get('/users/{user}/edit', [ProfileController::class, 'edit_user'])->name('users.edit');
    Route::get('/users/create', [ProfileController::class, 'create_user'])->name('users.create');
    Route::post('/users/store', [ProfileController::class, 'store_user'])->name('users.store');
    Route::delete('/users/{user}', [ProfileController::class, 'destroy_user'])->name('users.destroy');
});


Route::middleware(['auth', RoleMiddleware::class . ':teacher,parent,student'])->group(function () {
    Route::patch('/profile/updateRole', [ProfileController::class, 'updateRole'])->name('profile.updateRole');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/goals/index', [GoalController::class, 'index'])->name('goals.index');
    Route::get('/goals/create', [GoalController::class, 'create'])->name('goals.create');
    Route::post('/goals', [GoalController::class, 'store'])->name('goals.store');
    Route::get('/goals/{id}/edit', [GoalController::class, 'edit'])->name('goals.edit');
    Route::patch('/goals/{id}', [GoalController::class, 'update'])->name('goal.update');
    Route::delete('/goals/{id}', [GoalController::class, 'destroy'])->name('goals.destroy');
});

// Route::middleware('auth')->group(function () {
//     Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendance.index');
// });
Route::middleware(['auth', RoleMiddleware::class . ':teacher,parent,student'])->group(function () {
    Route::get('/grades', [GradesController::class, 'index'])->name('grades.index');
});
Route::middleware(['auth', RoleMiddleware::class . ':teacher'])->group(function () {
    Route::get('/grades/create', [GradesController::class, 'create'])->name('grades.create');
    Route::post('/grades/store', [GradesController::class, 'store'])->name('grades.store');
    Route::get('/grades/{id}/edit', [GradesController::class, 'edit'])->name('grades.edit');
    Route::patch('/grades/{id}', [GradesController::class, 'update'])->name('grades.update');
    Route::delete('/grades/{id}', [GradesController::class, 'destroy'])->name('grades.destroy');
});

Route::middleware(['auth', RoleMiddleware::class . ':teacher,parent,student'])->group(function () {
    Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendance.index');
    Route::get('/attendance/create', [AttendanceController::class, 'create'])->name('attendance.create');
    Route::post('/attendance/store', [AttendanceController::class, 'store'])->name('attendance.store');
    Route::get('/attendance/{id}/edit', [AttendanceController::class, 'edit'])->name('attendance.edit');
    Route::patch('/attendance/{id}', [AttendanceController::class, 'update'])->name('attendance.update');
    Route::delete('/attendance/{id}', [AttendanceController::class, 'destroy'])->name('attendance.destroy');
});

// routes for the subjects and events
Route::middleware(['auth', RoleMiddleware::class . ':teacher,parent,student'])->group(function () {
    Route::get('/subject', [SubjectController::class, 'index'])->name('subject.index');
});

Route::middleware(['auth', RoleMiddleware::class . ':teacher'])->group(function () {
    Route::get('/subject/create', [SubjectController::class, 'create'])->name('subject.create');
    Route::post('/subject/store', [SubjectController::class, 'store'])->name('subject.store');
    Route::get('/subject/{id}/edit', [SubjectController::class, 'edit'])->name('subject.edit');
    Route::patch('/subject/{id}', [SubjectController::class, 'update'])->name('subject.update');
    Route::delete('/subject/{id}', [SubjectController::class, 'destroy'])->name('subject.destroy');

    Route::get('/event/create', [EventController::class, 'create'])->name('event.create');
    Route::post('/event/store', [EventController::class, 'store'])->name('event.store');
    Route::get('/event/{id}/edit', [EventController::class, 'edit'])->name('event.edit');
    Route::patch('/event/{id}', [EventController::class, 'update'])->name('event.update');
    Route::delete('/event/{id}', [EventController::class, 'destroy'])->name('event.destroy');
});

// Routes for all users overview
Route::middleware(['auth', RoleMiddleware::class . ':teacher'])->group(function () {
    Route::get('/teacher', [UserParentStudentController::class, 'index'])->name('teacher.index');
    Route::get('/teacher/create', [UserParentStudentController::class, 'create'])->name('teacher.create');
    Route::post('/teacher/store', [UserParentStudentController::class, 'store'])->name('teacher.store');
    Route::get('teacher/{parent_id}/{student_id}/edit', [UserParentStudentController::class, 'edit'])->name('teacher.edit');
    Route::put('teacher/{parent_id}/{student_id}', [UserParentStudentController::class, 'update'])->name('teacher.update');
    Route::delete('teacher/{parent_id}/{student_id}', [UserParentStudentController::class, 'destroy'])->name('teacher.destroy');
});

// Routes for the messages
Route::middleware(['auth', RoleMiddleware::class . ':teacher,parent,student'])->group(function () {
    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
});
Route::middleware(['auth', RoleMiddleware::class . ':teacher,parent'])->group(function () {
    Route::get('/messages/create', [MessageController::class, 'create'])->name('messages.create');
    Route::post('/messages/store', [MessageController::class, 'store'])->name('messages.store');
    Route::get('/messages/{id}/edit', [MessageController::class, 'edit'])->name('messages.edit');
    Route::put('/messages/{id}', [MessageController::class, 'update'])->name('messages.update');
    Route::delete('/messages/{id}', [MessageController::class, 'destroy'])->name('messages.destroy');
});

require __DIR__ . '/auth.php';
