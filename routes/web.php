<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/register/student', function() {
    return view('auth.memberRegister');
});

Route::get('/register/lecturer', function() {
    return view('auth.lecturerRegister');
});

Route::get('/register/admin', function() {
    return view('auth.adminRegister');
})->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/lecturer', 'LecturerController@index')->name('lecturer');
Route::get('/lecturer/{subscriptionId}/{courseId}', 'LecturerController@courseView');


Route::get('/student', 'StudentController@index')->name('student');
Route::get('/student/{subscriptionId}/{courseId}', 'StudentController@courseView')->name('student.course');

Route::post('/student', 'AdminController@createStudent');
Route::get('/admin/students', 'AdminController@students')->name('admin.students');
Route::get('/admin/courses', 'AdminController@courses')->name('admin.courses');
Route::get('/admin/results','ResultController@get')->name('admin.results');

Route::post('/course', 'CourseController@create');
Route::post('course/subscription','CourseController@createSubscription');

Route::post('/shedule/course','CourseController@shedule');
// Route::get('/degrees', 'DegreeController@home');
Route::post('/degree', 'DegreeController@create');

Route::post('/enroll','CourseController@enroll');
Route::post('/unenroll','CourseController@unenroll');

Route::get('/student/results', 'ResultController@stdProfile');

Route::get('/financer', 'FinancerController@index')->name('finance');
Route::get('/financer/details', 'FinancerController@paymentDetails')->name('finance.details');
Route::post('/financer/payment', 'FinancerController@payment');


Route::post('/semester/change','AdminController@changeSem');


