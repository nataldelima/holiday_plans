<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HolidayPlansController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');


Route::resource('holiday-plans', HolidayPlansController::class);
Route::get('holiday-plans/{id}/pdf', [HolidayPlansController::class, 'generatePDF']);
Route::middleware('auth:api')->group(function () {});
