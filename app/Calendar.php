<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class calendar extends Model
{
    public function Course(){
        return $this->hasOne('App\Course','id','course_id');
    }
}
