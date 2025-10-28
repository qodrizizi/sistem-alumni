<?php

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\AuthController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\AlumniJobController;
use App\Http\Controllers\AlumniEducationController;
use App\Http\Controllers\AlumniAchievementController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventMemberController;
use App\Http\Controllers\JobVacancyController;


// =========================================================================
// 1. AUTHENTICATION & USERS (Public) - BISA DIAKSES TANPA LOGIN
// =========================================================================

Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);


// =========================================================================
// 2. PROTECTED ROUTES (Requires Sanctum Token) - DIBUNGKUS DALAM MIDDLEWARE
// =========================================================================

Route::middleware('auth:sanctum')->group(function () {
    
    // --- AUTHENTICATION ---
    Route::post('/auth/logout', [AuthController::class, 'logout']); 
    
    // Rute untuk mendapatkan data user yang sedang login
    Route::get('/user', function (Request $request) { 
        return $request->user(); 
    });


    // --- ALUMNI (CORE CRUD) ---
    Route::apiResource('alumni', AlumniController::class);


    // --- ALUMNI DETAIL RESOURCES (Nested/Related) ---
    Route::apiResource('alumni-jobs', AlumniJobController::class)->parameters(['alumni-jobs' => 'id']);
    Route::apiResource('alumni-education', AlumniEducationController::class)->parameters(['alumni-education' => 'id']);
    Route::apiResource('alumni-achievements', AlumniAchievementController::class)->parameters(['alumni-achievements' => 'id']);


    // --- EVENTS ---
    Route::apiResource('events', EventController::class);
    
    // Event Members
    Route::apiResource('event-members', EventMemberController::class)->parameters(['event-members' => 'id']);

    
    // --- JOB VACANCIES ---
    Route::apiResource('job-vacancies', JobVacancyController::class)->parameters(['job-vacancies' => 'id']);

}); 