<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HolidayPlansController;


use App\Http\Controllers\AuthController;

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);


Route::middleware('auth:api')->group(function () {
    Route::get('/holiday-plans', [HolidayPlansController::class, 'index']);
    Route::get('/holiday-plans/{id}', [HolidayPlansController::class, 'show']);
    Route::post('/holiday-plans', [HolidayPlansController::class, 'store']);
    Route::put('/holiday-plans/{id}', [HolidayPlansController::class, 'update']);
    Route::delete('/holiday-plans/{id}', [HolidayPlansController::class, 'destroy']);
    Route::get('/holiday-plans/{id}/pdf', [HolidayPlansController::class, 'generatePdf']);
    Route::get('/holiday-plans-all', [HolidayPlansController::class, 'generateAllPdf']);
});
