<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLogin(){
        return View::make('login');
    }
    public function tryLogin(Request $request){
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            return redirect('/dashboard');
        }
        else{
           return "I'm sorry but those details are wrong";
        }
    }
}
