<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PlantDetail;

class PlantDetailSvgPathSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PlantDetail::create(array(
            'type'     => 'onion',
            'daystoharveststart'=> 84,
            'daystoharvestend'=> 110,
            'seedlingage'=> 56,
            'seasonstart'=> 2,
            'seasonend'=> 6,
            'tips'=> '["Make successive sowings every 3 to 4 weeks for a continuous supply",'.
            '"Straw mulch around the plants should keep dirt off their leaves",'.
            '"Plant onions in well draining soil"]',
            'svg_path'=>'single-plants.onion.onion-'
        ));

        PlantDetail::where('type', '=', 'shallot')->delete();

        $spinach = PlantDetail::where('type', 'spinach')->first();
        $spinach->svg_path = 'single-plants.spinach.spinach-';
        $spinach->save();
        $cauliflower = PlantDetail::where('type', 'cauliflower')->first();
        $cauliflower->svg_path = 'single-plants.cauli.cauli-';
        $cauliflower->save();
        $broccoli = PlantDetail::where('type','broccoli')->first();
        $broccoli->svg_path = 'single-plants.broccoli.broccoli-';
        $broccoli->save();
        $carrot = PlantDetail::where('type', 'carrot')->first();
        $carrot->svg_path = 'single-plants.carrot.carrot-';
        $carrot->save();
        $beetroot = PlantDetail::where('type', 'beetroot')->first();
        $beetroot->svg_path = 'single-plants.beetroot.beetroot-';
        $beetroot->save();
    }
}
