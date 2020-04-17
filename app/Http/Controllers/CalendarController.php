<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use App\Calendar;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function create(Request $request){
        

        
        $user = Auth::User();

        $date = Carbon::now()->format('d F, Y');
        $day = Carbon::now()->format('l');

        $check = Calendar::where('date',$date)->where('course_id', $request->course)->first();
        if($check){
            return [
                'status' => 400,
                'msg' => 'Calendar are exists'
            ];
        }


        $calendar = new Calendar;
        $calendar->user_id = $user->id;
        $calendar->course_id = $request->course;
        $calendar->day = $day;
        $calendar->date = $date;
        $calendar->save();

        return [
            'status' => 200,
            'msg' => 'Calendar are created'
        ];



    }
}
