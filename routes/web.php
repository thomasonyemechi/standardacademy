<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CbtController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\MiscellaneousController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\ProspectiveCbtController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentDashboardController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\WebviewController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [WebviewController::class, 'guestIndex']);
Route::get('/about', [WebviewController::class, 'aboutIndex']);
Route::get('/contact', [WebviewController::class, 'contactIndex']);
Route::get('/admission', [WebviewController::class, 'admissionIndex']);
Route::get('/school-fees', [WebviewController::class, 'feesIndex']);
Route::get('/gallery', [WebviewController::class, 'galleryIndex']);
Route::get('/news', [WebviewController::class, 'newsIndex']);

Route::get('/news/{slug}', [BlogController::class, 'blogSingleIndex']);
Route::get('/news', [BlogController::class, 'blogsIndex']);



Route::group([], function () {

    // guardian Routes





    Route::view('/guardian/login', 'parent.login')->name('login');
    Route::post('/guardian-login', [ParentController::class, 'guardianLogin']);
    Route::get('/parent_logout',  function () {
        Auth::guard('guardian')->logout();
        return redirect('guardian.login')->with('success', 'You have been logged out');
    });
    Route::group(['prefix' => 'guardian/', 'as' => 'guardian.', 'middleware' => ['auth:guardian']], function () {
        Route::get('/', [ParentController::class, 'parentDashboardIndex']);
        Route::get('/student/{student}', [ParentController::class, 'viewStudentProfile']);

    });


    Route::view('/login', 'admin.login')->name('guardian.login');
    Route::get('/logout',  function () {
        Auth::logout();
        return redirect('login')->with('success', 'You have been logged out');
    });
    Route::post('/staff_login', [AuthController::class, 'staffLogin']);

    Route::group(['prefix' => 'admin/', 'as' => 'admin.', 'middleware' => ['auth']], function () {


        /////admin accessible
        Route::group(['middleware' => ['admin']], function () {

            Route::get('/dashboard', [WebviewController::class, 'adminDashboard']);


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
            Route::post('/assign-teacher', [ClassController::class, 'assignClassTeacher']);


            Route::get('/guardian-record', [ParentController::class, 'parentIndex']);
            Route::post('/add-guardian', [ParentController::class, 'createGuardianProfile']);
    

            Route::get('/add-student', [StudentController::class, 'addStudentIndex']);
            Route::get('/students', [StudentController::class, 'allStudent']);
      
    
        });


        Route::get('/student/{student_id}', [StudentController::class, 'studentProfileIndex']);
        Route::post('/create-student-profile', [StudentController::class, 'createStudentProfile']);
        Route::post('/update-student-class', [StudentController::class, 'updateStudentClass']);
        Route::post('/update-student-profile', [StudentController::class, 'updateStudentProfile']);


        Route::get('/class-profile/{class_id}', [ClassController::class, 'classProfileIndex']);

        Route::get('/manage-subject', [SubjectController::class, 'subjectIndex']);
        Route::post('/create-subject', [SubjectController::class, 'createSubject']);
        Route::post('/update-subject', [SubjectController::class, 'updateSubject']);

   

        Route::get('/add-staff', [StaffController::class, 'addStaffIndex']);
        Route::post('/create-staff-profile', [StaffController::class, 'createStaffProfile']);
        Route::get('/staffs', [StaffController::class, 'staffListIndex']);
        Route::get('/staff/{staff_id}', [StaffController::class, 'staffProfileIndex']);
        Route::get('/staff-permission', [StaffController::class, 'permissionIndex']);


        Route::get('/manage-levy/{fe_id?}/{class_id?}', [FeeController::class, 'manageFeeIndex']);
        Route::post('/create-fee', [FeeController::class, 'crerateFeeCategory']);
        Route::post('/update-fee', [FeeController::class, 'updateFeeCategory']);
        Route::post('/set-fee', [FeeController::class, 'setFees']);
        Route::post('/view-fee', [FeeController::class, 'viewFee']);
        Route::post('/make-payment', [FeeController::class, 'MakeFeePayment']);
        Route::get('/fetch_fee/{fee}/{class}', [FeeController::class, 'fetSettedFee']);


        Route::get('/create-note', [NoteController::class, 'createNoteIndex']);
        Route::get('/delete-note/{note_id}', [NoteController::class, 'deleteNote']);
        Route::post('/create-note', [NoteController::class, 'createNote']);
        Route::get('/add-content/{note_id}', [NoteController::class, 'addContentIndex']);
        Route::post('/save-content', [NoteController::class, 'addNoteContent']);
        Route::post('/update-content', [NoteController::class, 'updateContent']);
        Route::get('/delete-content/{content_id}', [NoteController::class, 'deleteContent']);
        Route::get('/note-content/{note_id}', [NoteController::class, 'noteContentIndex']);
        Route::get('/note-list', [NoteController::class, 'contentListIndex']);
        Route::get('/class-notes', [NoteController::class, 'classNoteIndex']);

        Route::get('/create-assignment', [AssignmentController::class, 'createAssignmentIndex']);
        Route::post('/create-assignment', [AssignmentController::class, 'createAssignment']);
        Route::get('/delete-assignment/{assignment_id}', [AssignmentController::class, 'deleteAssignment']);
        Route::post('/update-assignment', [AssignmentController::class, 'updateAssignment']);
        Route::get('/class-assignment', [AssignmentController::class, 'classAssignmentIndex']);

        Route::get('/exam-types', [CbtController::class, 'examTypeIndex']);
        Route::post('/create-exam-type', [CbtController::class, 'addtype']);
        Route::post('/update-exam-type', [CbtController::class, 'updateType']);
        Route::get('/delete-exam-type/{type_id}', [CbtController::class, 'deleteType']);
        Route::get('/class-exams', [CbtController::class, 'examIndex']);
        Route::post('/create-exam', [CbtController::class, 'addexam']);
        Route::get('/question/{exam_id}', [CbtController::class, 'addQuestionIndex']);
        Route::post('/add-question', [CbtController::class, 'submitQuestion']);
        Route::post('/update-question', [CbtController::class, 'updateQuestion']);
        Route::get('/question-bank/{term?}/{class?}', [CbtController::class, 'questionBankIndex']);
        Route::post('/view-exam-bank', [CbtController::class, 'viewExamBank']);
        Route::get('/bank-question/{exam_id}', [CbtController::class, 'viewBankQuestions']);
        //start exams/test
        Route::get('/start-exam', [ExamController::class, 'startExamIndex']);
        Route::post('/start-exam', [ExamController::class, 'startTest']);
        Route::get('/activate-test/{test_id}', [ExamController::class, 'activateTest']);


        ////prospectvie exams group route
        Route::group(['prefix' => 'prospective/', 'as' => 'prospective.', 'middleware' => []], function () {
            Route::get('/create-exam', [ProspectiveCbtController::class, 'createProExamIndex']);
            Route::post('/create-exam', [ProspectiveCbtController::class, 'createProspectiveExam']);
            Route::get('/question/{exam_id}', [ProspectiveCbtController::class, 'addQuestionIndex']);
            Route::post('/add-question', [ProspectiveCbtController::class, 'submitQuestion']);
            Route::post('/update-question', [ProspectiveCbtController::class, 'updateQuestion']);
        });;

        Route::get('/upload-result/{class_id?}/{subject_id?}', [ResultController::class, 'uploadResultIndex']);
        Route::post('/start-result-params', [ResultController::class, 'startResult2']);
        Route::post('/view-broad-sheet', [ResultController::class, 'startResult3']);
        Route::get('/load-result/{class_id}/{subject_id}', [ResultController::class, 'loadResult']);
        Route::get('/broad-sheet/{class_id?}/{subject_id?}', [ResultController::class, 'broadSheetIndex']);
        Route::get('/class-result/{class_id?}', [ResultController::class, 'classResultIndex']);
        Route::post('/update-result-remark', [ResultController::class, 'updateComment']);

        Route::get('/create-post', [BlogController::class, 'blogIndex']);
        Route::post('/create-post', [BlogController::class, 'createPost']);
        Route::post('/update-post', [BlogController::class, 'updatePost']);

        Route::get('/manage-promotion/{class_id?}', [MiscellaneousController::class, 'promoteIndex']);


    });



    Route::view('/student/login', 'student.login')->name('student-login');
    Route::post('/student-login', [StudentDashboardController::class, 'loginStudent']);
    Route::get('/student_logout',  function () {
        Auth::guard('student')->logout();
        return redirect('student/login')->with('success', 'You have been logged out');
    });
    Route::group(['prefix' => 'student/', 'as' => 'student.', 'middleware' => ['auth:student']], function () {
        Route::get('/', [StudentDashboardController::class, 'dash']);
        Route::get('/my-profile', [StudentDashboardController::class, 'profileRet']);
        Route::get('/exam', [StudentDashboardController::class, 'startIndex']);
        Route::get('/question/{result_summary_id}', [StudentDashboardController::class, 'answerIndex']);
        Route::get('/proceed-toexam/{test_id}', [ExamController::class, 'proceedToTest']);


        Route::post('/save-answer', [ExamController::class, 'saveAnswer']);
        Route::get('/notes', [StudentDashboardController::class, 'readNoteIndex']);

    });



});
