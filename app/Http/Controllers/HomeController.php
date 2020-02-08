<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Course;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function getStudents()
    {
        $students = Student::all();
        return view('students',compact('students'));
    }

    public function getCourses(){
        $courses = Course::where('status',1)->get();
        $courses100 = Course::where('status',1)->where('level_id', 1)->get();
        $courses200 = Course::where('status',1)->where('level_id', 2)->get();
        $courses300 = Course::where('status',1)->where('level_id', 3)->get();
        $courses400 = Course::where('status',1)->where('level_id', 4)->get();

        $data = ['100' => $courses100, '200' => $courses200, '300' => $courses300, '400' => $courses300];
        // dd($courses);
        return view('courses',compact('courses','data'));
    }
}
