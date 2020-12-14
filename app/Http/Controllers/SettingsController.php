<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class SettingsController extends Controller
{
    public function showSettings(){
            $user = Auth::user();
            return View::make('settings',['user'=>$user]);
    }
    public function profileChange(Request $request){
        $this->validate(request(), [
            'name' => ['required',new FullnameRule()],
            'email' => 'required|email|unique:users,email',
            'newpassword' => 'confirmed|min:8',
        ]);
    //Needs to - check which elenments have been input
    //make sure the password is always there and matches user password
    //update entries which are existent for the user
    //check that passwords match
    //redirect back to settings
    }
}
