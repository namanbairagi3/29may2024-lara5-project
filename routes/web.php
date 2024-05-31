<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthenticationController;

Route::get('/', function () {
    return view('login'); //login.blade.php
});

Route::get('/register', function () {
    return view('register'); //register.blade.php
})->name('register');


Route::post('/login', [AuthenticationController::class, 'login'])->name('login');

Route::post('/registration-user',[AuthenticationController::class,'store'])->name('abc'); //i am defining the route

Route::get('/dashboard', function(){
    return view('dashboard'); //dashboard.blade.php
})->name('dashboard');




