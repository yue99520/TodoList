<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Column extends Model
{
    //  boolean, text, time, number

    public $timestamps = false;

    function task()
    {
        return $this->hasOne(Task::class);
    }
}
