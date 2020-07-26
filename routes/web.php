<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('home');
})->name('index');

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/login', function () {
    if (auth()->check()) {
        return redirect()->route('/');
    } else {
        return view('login');
    }
})->name('login');

Route::get('/register', function () {
    if (auth()->check()) {
        return redirect()->route('/');
    } else {
        return view('register');
    }
})->name('register');
