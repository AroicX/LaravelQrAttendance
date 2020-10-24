<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{

    public function Calendar(){
        return $this->belongsTo('App\Calendar');
    }
    public function Student(){
        return $this->hasOne('App\Student','id','student_id');
    }
    public function Courses(){
        return $this->hasMany('App\Course','id','course_id');
    }
 
}
