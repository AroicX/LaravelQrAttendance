<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function Attendance(){
        return $this->hasMany('App\Attendance');
    }

    public function Courses(){
        return $this->hasMany('App\Course','id','course_id');
    }
}
