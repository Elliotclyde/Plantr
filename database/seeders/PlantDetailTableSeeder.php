<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PlantDetail;
use Illuminate\Support\Facades\DB;

class PlantDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plant_details')->delete();
        PlantDetail::create(array(
            'type'     => 'beetroot',
            'daystoharveststart'=> 56,
            'daystoharvestend'=> 70,
            'seedlingage'=> 21,
            'seasonstart'=> 7,
            'seasonend'=> 4,
            'tips'=> '["Harvest beetroot earlier for baby beets","Beetroot need phosphorus to develop","Plant beetroot in well draining soil"]',
            'svg_path' => 'single-plants.beetroot.beetroot-'
        ));
        PlantDetail::create(array(
            'type'     => 'broccoli',
            'daystoharveststart'=> 77,
            'daystoharvestend'=> 107,
            'seedlingage'=> 35,
            'seasonstart'=> 12,
            'seasonend'=> 5,
            'tips'=> '["Broccoli is a leafy crop and thrives with nitrogen fertiliser","A single broccoli plant should bear for many weeks","Plant broccoli in well draining soil"]'
            ,'svg_path' => 'single-plants.broccoli.broccoli-'
        ));

        PlantDetail::create(array(
            'type'     => 'cauliflower',
            'daystoharveststart'=> 100,
            'daystoharvestend'=> 168,
            'seedlingage'=> 21,
            'seasonstart'=> 12,
            'seasonend'=> 3,
            'tips'=> '[ "cauliflower is a leafy crop and thrives with nitrogen fertiliser","Dust or regularly spray cauliflower to keep caterpillars and aphids away"'.
            ',"Cut the white cauliflower curds while they\'re tight and solid"]'
            ,'svg_path' => 'single-plants.cauli.cauli-'
        ));
        PlantDetail::create(array(
            'type'     => 'carrot',
            'daystoharveststart'=> 75,
            'daystoharvestend'=> 100,
            'seedlingage'=> 7,
            'seasonstart'=> 7,
            'seasonend'=> 3,
            'tips'=> '["Carrots love sandy soil with no rocks or obstructions",'.
            '"Thin carrot seedlings so they are 2-3cm apart",'.
            '"Do not overfeed carrots, especially with high nitrogen fertilisers",'.
            '"It can be problematic to plant carrots as transplants"]'
            ,'svg_path' => 'single-plants.carrot.carrot-'
        ));
        PlantDetail::create(array(
            'type'     => 'spinach',
            'daystoharveststart'=> 56,
            'daystoharvestend'=> 100,
            'seedlingage'=> 21,
            'seasonstart'=> 2,
            'seasonend'=> 6,
            'tips'=> '["Make successive sowings every 3 to 4 weeks for a continuous supply",'.
            '"Straw mulch around the plants should keep dirt off their leaves",'.
            '"Plant spinach in well draining soil"]',
            'svg_path' => 'single-plants.spinach.spinach-'
        ));
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
    }
}
