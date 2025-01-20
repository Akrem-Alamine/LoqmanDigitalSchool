<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController; // Import the CourseController

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/ajoutercours', function () {
    return view('ajoutercours');
})->name('ajoutercours');

Route::post('/courses/store', [CourseController::class, 'store'])->name('courses.store');

Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/listecours', [CourseController::class, 'index'])->name('listecours');
