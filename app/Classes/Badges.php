<?php namespace App\Classes;

use App\Models\User;
use App\Models\Plant;
use App\Models\PlantDetail;
use Illuminate\Support\Carbon;

class Badges{
    public function __invoke()
    {
        foreach (User::all() as $user) {
            foreach($user->plants as $plant)
            {
                // if plant is prop tray, last login is before transplant date and now is after plant date
                if($plant->propogation_type == "proptray" && dateHasPassedSinceLogin($user,getTransplantDate($plant)))
                {
                    $plant->badge = 'readytotransplant';
                    $plant->save();
                }
                // if last login is before harvest date and now is after harvest date
                if(dateHasPassedSinceLogin($user,getHarvestStartDate($plant)))
                {
                    $plant->badge = 'readytoharvest';
                    $plant->save();
                }
                // if last login is before harvest date and now is after plant date
                if(dateHasPassedSinceLogin($user,getHarvestStartDate($plant)))
                {
                    $plant->badge = 'old';
                    $plant->save();
                }
            }
        }
    }
}

function getTransplantDate($plant){
    $detail = PlantDetail::where('type', $plant->type)->first();
    return createCarbon($plant->planted)->addDays($detail->seedlingage);
}
function getHarvestStartDate($plant){
    $detail = PlantDetail::where('type', $plant->type)->first();
    return createCarbon($plant->planted)->addDays($detail->daystoharveststart);
}
function getHarvestEndDate($plant){
    $detail = PlantDetail::where('type', $plant->type)->first();
    return createCarbon($plant->planted)->addDays($detail->daystoharvestend);
}

function dateHasPassedSinceLogin($user,$date){

    if(Carbon::now()->isBefore(createCarbon($date))){
        return false;
    }
    //If user has never logged in return true (show badges)
    if(!$user->last_login){
        return true;
    }
    return createCarbon($user->last_login)->isBefore(createCarbon($date));
}

function createCarbon($date){
    return new Carbon($date,'pacific/auckland');
}