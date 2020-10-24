<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PlantController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Plant;
use App\Classes\ViewPlant;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

 //public routes

Route::get('/', function () {
    if(Auth::check()){
        return redirect()->route('dashboard');
    }
    else{
    return view('welcome');
    }
})->name('welcome');

Route::get('/resources', function () {
    return view('resources');
})->name('resources');

Route::get('/about', function () {
    return view('about');
})->name('about');

//login routes

Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'tryLogin']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//private routes

Route::get('/dashboard', function () {
    $user = Auth::user();
    $viewPlants = $user->plants->map(function($plant){return ViewPlant::getViewPlant($plant);});
    return View::make('dashboard',['plants'=>$viewPlants,'name'=>$user->name]);
})->middleware('auth')->name('dashboard');

//private plant routes

Route::middleware(['auth'])->group(function(){

    Route::get('/newplant',[PlantController::class,'create'])->name('newplant');
    Route::post('/newplant', [PlantController::class,'store'])->name('newplant');
    Route::get('/plant/{plant}', [PlantController::class,'show'])->name('showplant');
    Route::delete('plant/{plant}',[PlantController::class,'destroy'])->name('deleteplant');
    Route::post('transplant/{plant}',[PlantController::class,'transplant'])->name('transplant');
});
 
