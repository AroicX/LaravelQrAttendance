<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class StaffController extends Controller
{


    public function Courses(Request $request)
    {

        $course = $request->course;
        $getUser =  User::where('id',Auth::id())->first();
         User::where('id',Auth::id())->update(['courses' => json_encode($course) ]);
        return redirect()->back();
    }

    public function myCourses()
    {
        $getUser =  User::where('id',Auth::id())->first();
        $oldCourses = json_decode($getUser->courses);
        return $oldCourses;
    }

    function getStafByID(){
        return 123;
    }


}
