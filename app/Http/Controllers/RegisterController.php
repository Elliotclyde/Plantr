<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Rules\FullnameRule;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegister(){
        return View::make('register');
    }
    public function tryRegister(){
        $this->validate(request(), [
            'name' => ['required',new FullnameRule()],
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',
            'username' => 'required|unique:users,username'
        ]);


        
        return redirect()->to('/settings');
    }
}
