<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthenticationController;

Route::get('/', function () {
    return view('login'); //login.blade.php
});

Route::get('/register', function () {
    return view('register'); //register.blade.php
});

Route::post('/registration-user',[AuthenticationController::class,'store'])->name('abc'); //i am defining the route




