<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    function users()
    {
        return $this->belongsToMany(User::class);
    }
}
