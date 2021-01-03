<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Classes\RainHandler;
use Illuminate\Support\Carbon;
use App\Models\User;

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
            RainHandler::firstLogin();
            $user = User::findorfail(Auth::id());  
            $user->last_login = Carbon::now()->format('Y-m-d H:i:s');
            $user->save();
            return redirect()->route('dashboard');
        }
        else{
            return redirect()->route('login')->withErrors(['password'=>"Sorry, that username and password didn't match"])->withInput();
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('welcome');
    }
}
