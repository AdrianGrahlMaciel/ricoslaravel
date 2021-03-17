<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function  setDefaultCity(Request $request, $id){
        $user = User::find($id);
        $city = City::find($request->city_id);
        if($user && $city){
            $user->defcity_id = $city->id;
            $user->save();
            return response()->json([
                'defcity' => $city,
                'status' => 'ok'
            ]);
        }else{
            return response()->json([
                'status' => 'error'
            ]);
        }
    }
    public function  getDefaultCity($user_id){
        $user = User::find($user_id);
        $city = City::find($user->defcity_id);
        
        return response()->json([
            'city' => $city,
            'status' => 'ok'
        ]);
        
    }
}
