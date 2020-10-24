<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class RegisterController extends Controller
{
    public function showRegister(){
        return View::make('register');
    }
}
