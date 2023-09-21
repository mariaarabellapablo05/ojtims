<?php

use App\Http\Controllers\AccountInfo;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\MOAUploadController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\ForgotPassController;
use App\Http\Controllers\CoursePerSYController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\AnnouncementController;

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

Route::get('/', function () {
    return view('auth.login');
});


Route::get('/login', [AuthController::class,'login']);
Route::get('/registration', [AuthController::class,'registration']);

Route::post('/register-user', [AuthController::class,'registerUser'])->name('register-user');
Route::post('/login-user',[AuthController::class,'loginUser'])->name('login-user');

Route::get('/reset', [ForgotPassController::class,'resetP']);
Route::get('/forgot', [ForgotPassController::class,'forgotP']);
Route::post('/forgotPass', [ForgotPassController::class,'forgotPass'])->name('forgotPass');
Route::post('/reset-password',  [ForgotPassController::class,'resetPass'])->name('password.update');


Route::get('/dashboard',[AuthController::class,'dashboard']); 

Route::get('/logout',[AuthController::class, 'logout']);

Route::get('/professorTab', [AuthController::class,'professorTab']);
Route::post('/professorCreate', [AuthController::class,'professorCreate'])->name('professorCreate');
Route::get('/maintenance',[MaintenanceController::class,'maintenance']);
Route::post('/courses', [MaintenanceController::class,'courses'])->name('courses');

Route::get('/uploadpage', [FileController::class, 'show'])->name('uploadpage');
Route::post('/uploadfile', [FileController::class,'uploadfile']);



Route::get('/download/{file}', [FileController::class,'download']);
Route::get('/view/{is}', [FileController::class,'view']);
Route::post('/remove/{id}', [FileController::class,'remove']);
Route::get('/search', [FileController::class,'search']);
Route::get('/MOA', [CoursePerSYController::class,'coursesSY']);
Route::post('/courseCreate', [CoursePerSYController::class,'courseCreate'])->name('courseCreate');
Route::get('/companies/{course}/{school_year}', [CompanyController::class,'companies']);
Route::post('/companyCreate', [CompanyController::class,'companyCreate'])->name('companyCreate');
Route::get('/MOAupload/{course}/{school_year}/{company_name}', [MOAUploadController::class,'moaUploadPage']);
Route::post('/uploadMOA', [MOAUploadController::class,'uploadfile']);
Route::get('/moa/download/{file}', [MOAUploadController::class,'download']);
Route::post('/moa/remove/{id}', [MOAUploadController::class,'remove']);
Route::get('/moa/view/{is}', [MOAUploadController::class,'view']);
Route::post('/sendFile', [MOAUploadController::class,'sendFiles']);
Route::get('/send/download/{file}', [MOAUploadController::class, 'downloadFile'])->name('download.file');
 
Route::get('/studentLists', [StudentController::class,'StuList']);
Route::post('/announcements', [AnnouncementController::class,'announcement']);


Route::get('/accountinfo', [AccountInfo::class,'accountinfo']);
Route::put('/edit/{email}', [AccountInfo::class,'editojt']);
Route::put('/change_password/{id}', [AccountInfo::class,'change_password']);

Route::get('/student/home',[AuthController::class,'student_home'])->name('student_home');
Route::get('student/login',[AuthController::class, 'logout']);
Route::get('/student/accountinfo', [StudentController::class,'student_acc']);
Route::put('/student/edit/{email}', [StudentController::class,'edit']);
Route::get('/student/class', [StudentController::class,'class']);
Route::post('/student/join/{email}', [StudentController::class,'join']);
Route::get('/student/files', [StudentController::class,'fileSee']);
Route::get('/student/ojtinfo', [StudentController::class,'ojtInformation']);
Route::put('/student/ojtEdit/{studentNum}', [StudentController::class,'ojt_edit']);


Route::get('/professor/home',[AuthController::class,'professor_home'])->name('professor_home');
Route::get('/professor/login',[AuthController::class, 'logout']);
Route::get('/professor/accountinfo', [AccountInfo::class,'profAcc']);
Route::put('/professor/edit/{id}', [AccountInfo::class,'edit']);
Route::put('/professor/change_password/{id}', [AccountInfo::class,'change_password']);
Route::get('/professor/class', [ProfessorController::class,'class']);
Route::get('/professor/listStudents/{course}', [ProfessorController::class,'show']);
Route::get('/supTab', [AuthController::class,'supTab']);
Route::post('/supCreate', [AuthController::class,'supCreate'])->name('supCreate');
Route::post('/roomCreate', [ProfessorController::class,'roomCreate'])->name('roomCreate');
Route::get('/professor/classList/{course}', [ProfessorController::class,'show_list']);
Route::post('/professor/approve/{email}', [ProfessorController::class,'approve']);
Route::post('/professor/deny/{email}', [ProfessorController::class,'deny']);
Route::get('/professor/upload', [ProfessorController::class,'uploadP']);



Route::get('/supervisor/home',[AuthController::class,'sup_home'])->name('sup_home');
Route::get('/supervisor/login',[AuthController::class, 'logout']);