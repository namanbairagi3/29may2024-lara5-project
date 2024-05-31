<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
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

   //withSuccess() method will create a session variable of name 'success'

    return redirect('/register')->withSuccess('User Registered successfully');
   } //

   public function login(Request $request){ //$request is a builtin object for receving data
        
      //dd($request->only('email','password')); //if you want to recive all parameter which is comming
      $credentials = $request->only('email','password');
      //$credentials is an associative array var['key']
      //$credentials is not a classObject co->method()

      $user = User::where('email',$credentials['email'])->first();
      //dd($user->email);
      if (Auth::attempt($credentials)) {
          $request->session()->regenerate();

          
          // I want to create a session variable

         //classObject->method1()->method2(aarg1,aarg2)
          $request->session()->put('username',$user->name);

          return redirect()->intended('dashboard');
      }

      return back()->withErrors([
          'email' => 'Invalid Credentials',
      ])->onlyInput('email');
  }
   }