<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Plant;

class PlantController extends Controller
{
    public function create(){
        return View::make('newplant');
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
}
