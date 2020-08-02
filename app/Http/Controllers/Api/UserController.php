<?php

namespace App\Http\Controllers\Api;

use App\Group;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use PhpOption\None;

class UserController extends Controller
{
    function get($id)
    {
        return User::query()->where('id', $id)->firstOrFail();
    }
}
