<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PlantController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Plant;

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'tryLogin']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    $user = Auth::user();
    return View::make('dashboard',['plants'=>$user->plants,'name'=>$user->name]);
})->middleware('auth')->name('dashboard');

Route::middleware(['auth'])->group(function(){

    Route::get('/newplant',[PlantController::class,'create'])->name('newplant');
    Route::post('/newplant', [PlantController::class,'store'])->name('newplant');
    Route::get('/plant/{plant}', [PlantController::class,'show'])->name('showplant');
    Route::delete('plant/{plant}',[PlantController::class,'destroy'])->name('deleteplant');
    Route::post('transplant/{plant}',[PlantController::class,'transplant'])->name('transplant');
});
 
