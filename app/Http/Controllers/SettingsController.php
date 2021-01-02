<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\FullnameRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class SettingsController extends Controller
{
    public function showSettings()
    {
        $user = Auth::user();
        return View::make('settings', ['user' => $user]);
    }
    public function profileChange(Request $request)
    {
        Session::flash('settingsOpen', 'profilesettings');

        $credentials = ['username' => Auth::user()->username, 'password' => $request->input('oldpassword')];
        if (!Auth::attempt($credentials)) {
            return Redirect::back()->withErrors(['oldpassword' => 'Incorrect password'])->withInput();
        } else {
            //Filter out any details that weren't entered
            $entered = array_filter($request->all(), function ($input) {
                return ($input);
            });

            //Validate details that were entered
            $validator = Validator::make($entered, [
                'email' => 'email|unique:users,email,' . Auth::id(),
                'newpassword' => 'confirmed|min:8',
                'name' => [new FullnameRule()],
            ]);

            if ($validator->fails()) {
                return redirect('/settings#change-details')->withErrors($validator)->withInput();
            }
            else{Session::flash('justUpdated',true);}

            // Filter out the 3 things we're updating
            $properties = array_filter($entered, function ($key) {
                return in_array($key, ['email', 'newpassword', 'name']);
            }, ARRAY_FILTER_USE_KEY);

            //change New password to just "password"
            if (isset($properties['newpassword'])) {
                $properties['password'] = Hash::make($properties['newpassword']);
                unset($properties['newpassword']);
            }

            Session::flash('justUpdated',true);
            $user = User::findOrFail(Auth::id());
            $user->fill($properties)->save();
            return redirect('/settings')->withInput();
        }
    }
    public function plantingChange(Request $request){
        Session::flash('settingsOpen', 'plantsettings');
        $input = $request->only(['climate','rain_toggle','rain_frequency']); 
        if (array_key_exists('rain_toggle',$input)){
            $input['rain_toggle']=true;
        }
        else {
           $input['rain_toggle']=false;
        }

         $validator = Validator::make($input, [
             'climate' => 'string',
             'rain_toggle' => 'boolean',
             'rain_frequency' => 'integer',
         ]);
         if ($validator->fails()) {
            return redirect('/settings')->withErrors($validator)->withInput();
        }
        else{
            $user = User::findOrFail(Auth::id());
            $user->climate=$input['climate'];
            $user->rain_toggle=$input['rain_toggle'];
            if (array_key_exists('rain_frequency',$input)){
                $user->rain_frequency=$input['rain_frequency'];
            }
            $user->save();
            Session::flash('justUpdated',true);
            return redirect('/settings')->withInput();
        }
    }
}
