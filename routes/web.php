<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    // Count the total number of students and courses
    $students_count = \App\Models\Student::count();
    $courses_count = \App\Models\Course::count();
    $courses = \App\Models\Course::all();
    // Calculate the average units across all courses
    $average_units = round($courses->avg('unit'), 2);
    // Count the total number of enrollments
    $enrollments_count = \DB::table('course_student')->count();
    return view('dashboard', compact('students_count', 'courses_count', 'enrollments_count', 'average_units' ));
});

Route::get('/students', [StudentController::class, 'index'])->name('students.index');

Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');

Route::get('/students/{id}', [StudentController::class, 'show'])->name('students.show');

Route::post('/students', [StudentController::class, 'store'])->name('students.store');

Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');

Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');

Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');

// routes for courses

Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');

Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');

Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.show');

Route::get('/courses/{id}/edit', [CourseController::class, 'edit'])->name('courses.edit');

Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');

Route::put('/courses/{id}', [CourseController::class, 'update'])->name('courses.update');

Route::delete('/courses/{id}', [CourseController::class, 'destroy'])->name('courses.destroy');


// routes for enrollments

Route::get('/enrollments', [EnrollmentController::class, 'index'])->name('enrollments.index');

Route::get('/enrollments/create', [EnrollmentController::class, 'create'])->name('enrollments.create');

Route::post('/enrollments', [EnrollmentController::class, 'store'])->name('enrollments.store');

Route::get('/enrollments/{id}/edit', [EnrollmentController::class, 'edit'])->name('enrollments.edit');




