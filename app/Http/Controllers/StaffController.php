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


        User::where('id',Auth::id())->update(['courses' => json_encode($course) ]);



       return redirect()->back();
    }

    function getStafByID(){
        return 123;
    }


}
