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
            'tips'=> '["Harvest beetroot earlier for baby beets","Beetroot need phosphorus to develop","Plant beetroot in well draining soil"]'
        ));
    }
}
