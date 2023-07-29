<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




Route::group([], function (){

    Route::view('/login', 'admin.login')->name('login');
    Route::post('/staff_login', [AuthController::class, 'staffLogin']);

    Route::group(['prefix' => 'admin/', 'as' => 'admin.', 'middleware' => ['auth'] ], function (){
        Route::get('/term-setup', [SessionController::class, 'termIndex']);
        Route::post('/create-session', [SessionController::class, 'createSession']);
        Route::post('/update-term', [SessionController::class, 'updateTermInfo']);
        Route::get('/activate-term/{term_id}', [SessionController::class, 'activateTerm']);

        Route::post('/create-class-category', [ClassController::class, 'createClassCategory']);
        Route::post('/update-class-category', [ClassController::class, 'updateClassCategory']);
        Route::get('/class-arms', [ClassController::class, 'categoryIndex']);

        Route::post('/create-arm', [ClassController::class, 'createClassArm']);
        Route::post('/update-arm', [ClassController::class, 'updateClassArm']);

        Route::get('/manage-class', [ClassController::class, 'classIndex']);
        Route::post('/create-class', [ClassController::class, 'createClass']);
        Route::post('/order-class', [ClassController::class, 'orderClass']);

        Route::get('/manage-subject', [SubjectController::class, 'subjectIndex']);
        Route::post('/create-subject', [SubjectController::class, 'createSubject']);
        Route::post('/update-subject', [SubjectController::class, 'updateSubject']);

        Route::get('/guardian-record', [ParentController::class, 'parentIndex']);
        Route::post('/add-guardian', [ParentController::class, 'createGuardianProfile']);
        

    });

});