<?php



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


Route::get('student-attendance/{url}', 'AttendanceController@getByURL')->name('get.url');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/',function(){
    return view('welcome');
});
Route::get('/students', 'HomeController@getStudents')->name('students');
Route::get('/students/{id}', 'HomeController@getStudentById')->name('students.id');
Route::get('/courses', 'HomeController@getCourses')->name('courses');
Route::get('/get-courses', 'StaffController@myCourses')->name('my.courses');
Route::post('/create-courses', 'StaffController@Courses')->name('staff.course');
Route::get('/attendance', function(){
    return view('attendance');
});
Route::get('/check-attendance', function(){
    return view('attendance-record');
});


Route::post('create-calendar', 'calendarController@create')->name('new.calendar');
Route::post('create-attendance', 'AttendanceController@create')->name('new.attendance');
Route::post('find-attendance', 'AttendanceController@find')->name('find.attendance');
Route::get('get-attendance/{id}', 'AttendanceController@getById')->name('get.attendance');

Route::get('/record/?course={course_id}&calendar={calendar_id}','Attendance@getRecord');



Route::get('/profile',function(){
    return view('profile');
});

Route::get('/time-table',function(){
    return view('time-table');
});

Route::get('/send-attendance/{url}', 'AttendanceController@send');


