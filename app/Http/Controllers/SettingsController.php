<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class SettingsController extends Controller
{
    public function showSettings(){
            $user = Auth::user();
            return View::make('settings',['user'=>$user]);
    }
    public function profileChange(Request $request){
        Session::flash('settingsOpen', 'profilesettings');
    
        $credentials = ['username'=>Auth::user()->username,'password'=>$request->input('oldpassword')];
        if(!Auth::attempt($credentials)){
            return Redirect::back()->withErrors(['oldpassword'=> 'Incorrect password']);
            
        }
        else{
            //here we will: 
            //Check what info we got
            //Validate the info 
            //if incorrect we will redirect back with errors
            //else we will  change the details 
            //and send back some kind of message to the user using flash 
            return 'correct password';
        }
    }
}
