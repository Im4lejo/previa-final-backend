<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;

Route::post('/students/{id}/modules', [StudentController::class, 'matricular']);
Route::post('/teachers/{id}/modules', [TeacherController::class, 'matricular']);
Route::apiResource('students', StudentController::class);
Route::apiResource('teachers', TeacherController::class);
