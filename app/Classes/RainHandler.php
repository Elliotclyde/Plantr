<?php
namespace App\Classes;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class RainHandler
{
    public static function firstLogin(){

        $user = User::findOrFail(Auth::id());
        $divisibleByFrequency = (Carbon::createMidnightDate(1980,1,1)->diffInDays(Carbon::now()) % $user->rain_frequency == 0);
        //Change this to also check frequency
        if($user->rain_toggle && $divisibleByFrequency){
            session(['raining'=>true]);
        }
    }
}