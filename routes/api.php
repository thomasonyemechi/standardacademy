<?php

use App\Http\Controllers\FeeController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\TranscriptController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/update_school_fee_per_record', [FeeController::class, 'updateSchoolFeePerRecord']);

Route::post('/update_school_fee_record', [FeeController::class, 'updateSchoolFeePerRecord_MultipleStudent']);
Route::get('/admin/load-result/{class_id}/{subject_id}', [ResultController::class, 'loadResult']);

Route::post('/update-student-result', [ResultController::class, 'editStudentResult']);
Route::post('/update-all-student-result', [ResultController::class, 'editMultipleResult']);


Route::get('/viewer/result/{result_id}', [TranscriptController::class, 'Trans']);
Route::get('/broad/{clas_id}/{subject_id}', [ResultController::class, 'fetchSessionBroadSheet']);

Route::get('/class-result/{class_id}', [TranscriptController::class, 'classTermResult']);

Route::get('/users-permission', [StaffController::class, 'fetchUserPermission']);

Route::post('/permission-update', [StaffController::class, 'updatePermissionAll']);


Route::post('/guardian-login', [ParentController::class, 'guardianLogin']);
