<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index()
    {
        if (auth()->check()) {
            return view('home'); //todo redirect to user home
        } else {
            return view('home');
        }
    }
}
