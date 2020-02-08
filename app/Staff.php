<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    public function Courses(){
        return $this->hasMany('App\Course');
    }
}
