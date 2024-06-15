<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function register(){
        return view('register');
    }

    public function registerUser(Request $request){
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'remember_token'=>Str::random(60)
        ]);

        return redirect('/login');
    }

    public function login(){
        return view('login');
    }

    public function loginProcess(Request $request){
        if(Auth::attempt($request->only('email','password'))){
            return redirect('/book');
        }
        return redirect('/login')->withErrors('These credentials do not match our records.');
    }

    public function logout(){
        Auth::logout();
        return redirect('/register');
    }
}
