<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


use App\Models\Course;

use App\Http\Controllers\CourseController;

Route::get('/', function () {
    
    $courses = Course::all();
    return view('welcome', [
        'courses' => $courses,
    ]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/cursos', [CourseController::class, 'index'])->name('course.index');
Route::get('/cadastro', [CourseController::class, 'create'])->name('course.create');
Route::post('/curso', [CourseController::class, 'store'])->name('course.store');
Route::post('/inscrever', [CourseController::class, 'subscribe'])->name('course.subscribe');
Route::post('/carcelar-inscricao', [CourseController::class, 'unsubscribe'])->name('course.unsubscribe');


require __DIR__.'/auth.php';
