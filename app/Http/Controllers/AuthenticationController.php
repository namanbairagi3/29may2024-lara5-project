<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthenticationController extends Controller
{
   public function store(Request $request){
   // dd($request->all('email', 'password', 'password_confirmation'));
    $data = $request->only('name', 'email', 'password');
    //Insert 

    //1. querybuilder
    //2. eloquent 
    User::create($data);
    return 'hello';
   } //
}
