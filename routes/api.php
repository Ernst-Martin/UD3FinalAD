<?php

use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\SubjectController;
use App\Http\Controllers\API\EnrollmentController;
use App\Http\Controllers\API\AssignmentController;
use App\Http\Controllers\API\GradeController;
use App\Http\Controllers\API\AttendanceController;
use Illuminate\Support\Facades\Route;

Route::apiResource('users', UserController::class);
Route::apiResource('subjects', SubjectController::class);
Route::apiResource('enrollments', EnrollmentController::class);
Route::apiResource('assignments', AssignmentController::class);
Route::apiResource('grades', GradeController::class);
Route::apiResource('attendance', AttendanceController::class);