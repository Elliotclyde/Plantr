<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Plant;
use App\Models\PlantDetail;

class PlantController extends Controller
{
    public function create(){
        $plantDetail = PlantDetail::all();
        
        return View::make('newplant',
        ['planttypes'=>$plantDetail->map(
            function($plant){return $plant->type;}
            )
            
            ]
        );
    }
    public function store(Request $request){

        $plant = new Plant();
        $plant->user_id =Auth::id();
        $plant->type =$request->input('type');
        $plant->planted = $request->input('planted');
        $plant->propogation_type =$request->input('propogation_type');
        $plant->quantity =$request->input('quantity');
        $plant->save();
        
        return redirect()->route('dashboard');
    }
    public function show(Plant $plant){
        return View::make('plantdetails',['plant'=>$plant]);
    }
    public function destroy(Plant $plant){
        Plant::destroy($plant->id);
        return redirect()->route('dashboard');
    }
    public function transplant(Request $request, Plant $plant){
        $transplanted = $request->input('transplanted');
        $plant->transplanted=$transplanted;
        $plant->save();
        return redirect()->route('showplant',['plant'=>$plant]);
    }
}
