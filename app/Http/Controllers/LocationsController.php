<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use GuzzleHttp\Client;

class LocationsController extends Controller
{
    
    //Countries
    public function getCountries(){
        $countries = Country::all();
        return response()->json([
            'countries' => $countries
        ]);
    }
    public function getAvaiblesCountries(){
        $countries = Country::where('avaible','yes')->get();
        return response()->json([
            'countries' => $countries
        ]);
    }
    public function getCountry($id){
        $country = Country::find($id);
        return response()->json([
            'country' => $country
        ]);
    }
    
    //Cities
    public function getCities(){
        $cities = City::all();
        return response()->json([
            'cities' => $cities,
            'status' => 'ok'
        ]);
    }
    public function getAvaiblesCities(){
        $cities = City::where('avaible','yes')->get();
        return response()->json([
            'cities' => $cities
        ]);
    }
    public function getCity($id){
        $city = City::find($id);
        return response()->json([
            'city' => $city
        ]);
    }
    

    public static function geocode(){

        $ret = null;

        $client = new Client(); //GuzzleHttp\Client
        $result =(string) $client->post("https://maps.googleapis.com/maps/api/geocode/json?latlng=-27.3443768,-55.8356255&region=es&key=AIzaSyBueZrIL60BaAfTpf8dRBKSGUw6VQhMfdo")->getBody();
        $json =json_encode($result);

        echo $json;
    }
}
