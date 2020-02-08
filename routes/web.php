<?php

use Nexmo\Laravel\Facade\Nexmo;

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

Route::view('/attendance', 'react');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/',function(){
    return view('welcome');
});
Route::get('/students', 'HomeController@getStudents')->name('students');
Route::get('/courses', 'HomeController@getCourses')->name('courses');
Route::post('/create-courses', 'StaffController@Courses')->name('staff.course');


Route::get('/try', function () {
   
    Nexmo::message()->send([
        'to'   => '+2347016762847',
        'from' => '08187833885',
        'text' => 'test for rukky the facade to send a message.'
    ]);

    return 'msg sent';

});

