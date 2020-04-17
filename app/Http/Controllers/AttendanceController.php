<?php

namespace App\Http\Controllers;

use Auth;
use App\Student;
use App\Attendance;
use App\Course;
use Carbon\Carbon;
use App\Calendar;
use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;

class AttendanceController extends Controller
{
  
    public function create(Request $request)
    {

       $course = intval($request->course_id);

       $student =  Student::where('matric_no', $request->tag)->first();
       $date = Carbon::now()->format('d F, Y');
       $day = Carbon::now()->format('l');

       $cal = Calendar::where('date',$date)->where('course_id', $course)->first();
        // return $student;
       if($student){

        $check = Attendance::where('student_id',$student->id)
                            ->where('calendar_id',$cal->id)
                            ->where('course_id',$course)
                            ->first();

        if($check){

            return [
                'status' => 400,
                'msg' => 'Student with Matric No: '.$request->tag.' has already been signed In'
            ];
            
        }else{

            $attendance = new Attendance;
            $attendance->staff_id = Auth::id();
            $attendance->student_id = $student->id;
            $attendance->calendar_id = $cal->id;
            $attendance->course_id = $course;
            $attendance->save();



            return [
                'status' => 200,
                'msg' => 'Student with Matric No: '.$request->tag.' has been signed In',
                'data' => json_encode($student)
            ];
        }


       }else{
        return [
            'status' => 400,
            'msg' => 'Student not found'
        ];
       }

        
    }

    public function find(Request $request)
    {
        $qry = array($request->filter);

        $calendar = $qry[0][8];
        $course = $qry[0][21];

        // return $calendar;

        $cal = Calendar::where('id',$calendar)->where('course_id', $course)->with('Course')->first();
        $att = Attendance::where('calendar_id',$cal->id)->with('Student')->get();
        dd( [
            'calendar' => $cal,
            'attendance' => $att
        ]);
        

       

    }

    public function getById($id = null){

        // $att = Attendance::where('student_id',$id)->with('Courses')->get();
        $student = Student::where('id',$id)->with('Courses')->first();
        $loop = \json_decode($student->course_id);

        $courses = [];
        

        foreach ($loop as $key => $value) {
           
         $att = Attendance::where('course_id',$value)->where('student_id',$id)->with('Courses')->get();
        
            if($att){
               

            

                $getCourse = Course::where('id',$value)->first();
                $getCalendar = Calendar::where('course_id',$value)->get();

                if(count($getCalendar) > 1){
                    $rs = array(
                        'course_code' => $getCourse->course_code,
                        'calendar' => count($getCalendar) ,
                        'att' => count($att),
                        'attendance' => floor(count($att)/count($getCalendar) * 100)
                    );
                }else{
                    $rs = array(
                        'course_code' => $getCourse->course_code,
                        'calendar' => 0 ,
                        'att' => 0,
                        'attendance' => 0
                    );
                }
                
                
                array_push($courses,$rs);
            }
        //  return $getCalendar;

        }

       
        return view('user-record',compact('student','courses'));



        // return [
        //     'student' => $student,
        //     'attendance' => $att,
        //     'status' => 200
        // ];
    }
    public function getByURL($id = null){

        $id = decrypt($id);
        
        // $att = Attendance::where('student_id',$id)->with('Courses')->get();
        $student = Student::where('id',$id)->with('Courses')->first();
        if(!$student){
            return abort(404);
        }
        $loop = \json_decode($student->course_id);

        $courses = [];
        

        foreach ($loop as $key => $value) {
           
         $att = Attendance::where('course_id',$value)->where('student_id',$id)->with('Courses')->get();
        
            if($att){
               

            

                $getCourse = Course::where('id',$value)->first();
                $getCalendar = Calendar::where('course_id',$value)->get();

                if(count($getCalendar) > 1){
                    $rs = array(
                        'course_code' => $getCourse->course_code,
                        'calendar' => count($getCalendar) ,
                        'att' => count($att),
                        'attendance' => floor(count($att)/count($getCalendar) * 100)
                    );
                }else{
                    $rs = array(
                        'course_code' => $getCourse->course_code,
                        'calendar' => 0 ,
                        'att' => 0,
                        'attendance' => 0
                    );
                }
                
                
                array_push($courses,$rs);
            }
        //  return $getCalendar;

        }

       
        return view('url-attendance',compact('student','courses'));



        // return [
        //     'student' => $student,
        //     'attendance' => $att,
        //     'status' => 200
        // ];
    }

    public function send($id = null)
    {
        $id = decrypt($id);
        
        
        // $att = Attendance::where('student_id',$id)->with('Courses')->get();
        $student = Student::where('id',$id)->with('Courses')->first();
        // $base = config('app.url');
        $base = 'http://192.168.43.25';
        $link = $base.'/student-attendance/'.encrypt($id);

       

        $msg = 'Dear '.$student->parent_name.' '.$link;
       
    
      
        Nexmo::message()->send([
            'to'   => '+2347016762847',
            'from' => 'Salem University',
            'text' =>  $msg
        ]);

        return redirect()->back();
    }



}
