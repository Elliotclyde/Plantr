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

        $viewPlant->harvestStart = self::getCarbonDate($plant->planted)->addDays($plantDetails->daystoharveststart)->format('jS \\of F Y');
        $viewPlant->harvestEnd = self::getCarbonDate($plant->planted)->addDays($plantDetails->daystoharvestend)->format('jS \\of F Y');
        $viewPlant->diffToHarvest = self::getDiffToHarvest($plant, $plantDetails);

        $viewPlant->daysSincePlant = self::getCarbonDate($viewPlant->planted)->diffForHumans();
        $viewPlant->planted = self::getCarbonDate($plant->planted)->format('jS \\of F Y');

        $viewPlant->svgPath = $plantDetails->svg_path;
        $viewPlant->progress = max(0, min(100, (self::getCarbonDate($plant->planted)->diffInDays(Carbon::now()) / $plantDetails->daystoharvestend) * 100));
        $viewPlant->svgNum = ceil($viewPlant->progress / 100 * 3);
        if ($viewPlant->svgNum == 0) {
            $viewPlant->svgNum = 1;
        }

        $viewPlant->propogation_type = self::formatPropogationtype($plant->propogation_type);

        if (isset($viewPlant->transplanted)) {
            $viewPlant->daysSinceTransplant = self::getCarbonDate($plant->transplanted)->diffForHumans();
            $viewPlant->transplanted = self::getCarbonDate($plant->transplanted)->format('jS \\of F Y');
        }

        return $viewPlant;
    }

    private static function getCarbonDate($dateString)
    {
        return new Carbon($dateString);
    }
    private static function getDiffToHarvest($viewPlant, $plantDetails)
    {

        $average = round(($plantDetails->daystoharveststart + $plantDetails->daystoharvestend) / 2);

        return self::getCarbonDate($viewPlant->planted)->addDays($average)->diffForHumans();
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

}
