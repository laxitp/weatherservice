<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Config;
use Redirect;
use Illuminate\Support\Facades\Input;
use GuzzleHttp\Client;
use Validator;

class HomeController extends Controller {

    public function __construct() {
        
    }
    public function index(Request $request) {
        $client = new \GuzzleHttp\Client(["base_uri" => "https://samples.openweathermap.org"]);
        $options = [
            'form_params' => [
                "zip" => "94040,us",
                "appid" => "b6907d289e10d714a6e88b30761fae22"
            ]
        ];
        $response = $client->get("/data/2.5/weather", $options);
        $res = json_decode($response->getBody(), true);
        return view('welcome', compact("res"));
    }

}
