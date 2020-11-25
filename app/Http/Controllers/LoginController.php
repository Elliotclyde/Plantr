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
        
        $this->validate(request(), [
            'username' => 'required',
            'password' => 'required'
        ]);
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        }
        else{
            return redirect()->route('login')->withErrors(['Sorry, that username and password didn\'t match']);
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('welcome');
    }
}
