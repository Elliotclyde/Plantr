<?php
namespace App\Classes;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RainHandler
{
    public static function firstLogin(){
        $user = User::findOrFail(Auth::id());
        //Change this to also check frequency
        if($user->rain_toggle){
            session(['raining'=>true]);
        }
    }
}