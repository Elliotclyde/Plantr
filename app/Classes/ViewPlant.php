<?php

namespace App\Classes;

use App\Models\Plant;
use App\Models\PlantDetail;
use Illuminate\Support\Carbon;

class ViewPlant
{

    public static function getViewPlant(Plant $plant)
    {

        $viewPlant = clone $plant;
        $plantDetails = PlantDetail::where('type', $viewPlant->type)->first();
        $viewPlant->details=$plantDetails;

        $viewPlant->harvestStart = self::getCarbonDate($plant->planted)->addDays($plantDetails->daystoharveststart)->format('d/m/Y');
        $viewPlant->harvestEnd = self::getCarbonDate($plant->planted)->addDays($plantDetails->daystoharvestend)->format('d/m/Y');
        $viewPlant->diffToHarvest = self::getDiffToHarvest($plant, $plantDetails);
        $viewPlant->estimatedHarvestDate = self::getCarbonDate($plant->planted)->addDays(round(($plantDetails->daystoharveststart + $plantDetails->daystoharvestend) / 2))->format('d/m/Y');
  
        $viewPlant->daysSincePlant = self::getNiceDiffInDaysFromToday($plant->planted);
        $viewPlant->planted = self::getCarbonDate($plant->planted)->format('d/m/Y');

        $viewPlant->svgPath = $plantDetails->svg_path;
        $viewPlant->progress = max(0, min(100, (self::getCarbonDate($plant->planted)->diffInDays(Carbon::now()) / $plantDetails->daystoharvestend) * 100));
        $viewPlant->svgNum = ceil($viewPlant->progress / 100 * 3);
        if ($viewPlant->svgNum == 0) {
            $viewPlant->svgNum = 1;
        }

        $viewPlant->formattedPropogationType = self::formatPropogationtype($plant->propogation_type);

        if (isset($viewPlant->transplanted)) {
            $viewPlant->daysSinceTransplant = self::getCarbonDate($plant->transplanted)->diffForHumans();
            $viewPlant->transplanted = self::getCarbonDate($plant->transplanted)->format('d/m/Y');
        }

        $viewPlant->state = self::getState($viewPlant);
        $viewPlant->formattedState = self::formatState($viewPlant->state);

        return $viewPlant;
    }

    private static function getCarbonDate($dateString)
    {
        if(preg_match('/[0-9][0-9]\/[0-9][0-9]\/[0-9][0-9][0-9][0-9]/',$dateString))
        {
            return Carbon::createFromFormat('d/m/Y',$dateString);
        }
        return new Carbon($dateString,'pacific/auckland');
    }

    private static function getDiffToHarvest($viewPlant, $plantDetails)
    {
        $average = round(($plantDetails->daystoharveststart + $plantDetails->daystoharvestend) / 2);
        return self::getNiceDiffInDaysFromToday(self::getCarbonDate($viewPlant->planted)->addDays($average));
    }
    private static function formatPropogationtype($propogationType)
    {
        $formatMap = [
            'directsow' => 'Directly sown into the ground',
            'seedling' => 'Pre-grown seedling',
            'proptray' => 'Seedling in a propogation tray',
        ];
        return $formatMap[$propogationType];
    }

    private static function getNiceDiffInDaysFromToday($date){
        $diffinDays =  self::getCarbonDate($date)->diffInDays(Carbon::now('pacific/auckland'));
        if($diffinDays===0){ 
            return "Today";
        }
        return self::getCarbonDate($date)->midDay()->diffForHumans(Carbon::now('pacific/auckland')->midDay(), ['syntax' => Carbon::DIFF_RELATIVE_TO_NOW,'options' => Carbon::ONE_DAY_WORDS ]);
    }

    private static function getState($viewPlant){
        $afterOld = Carbon::now('pacific/auckland')->midDay()->isAfter(self::getCarbonDate($viewPlant->planted)->addDays($viewPlant->details->daystoharvestend));
        if($afterOld){
            return "old";
        }
        $beforePlant =  Carbon::now('pacific/auckland')->midDay()->isBefore(self::getCarbonDate($viewPlant->planted)->addDays(-1));
        if($beforePlant){
            return "planned";
        }
        if(!$beforePlant && Carbon::now('pacific/auckland')->midDay()->isBefore(self::getCarbonDate($viewPlant->harvestStart))){
            return "growing";
        }
        if(Carbon::now('pacific/auckland')->midDay()->isAfter(self::getCarbonDate($viewPlant->harvestStart))){
            return "harvest";
        }
    }
    private static function formatState($state)
    {
        $formatMap = [
            'old' => 'This plant might be getting a bit old',
            'planned' => 'You\'ve planned to plant this in the future',
            'growing' => 'This plant is currently growing',
            'harveststart' => 'It\'s time to start checking if this plant is ready to harvest!',
            'harvestend' => 'This plant should be ready to harvest!'
        ];
        return $formatMap[$state];
    }

}
