<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\BadResponseException;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Config;
use Redirect;
use Illuminate\Support\Facades\Input;
use GuzzleHttp\Client;
use Validator;
use Helper;
class WeatherApi extends Controller {

    private $HTTP_status = 200;
    private $status = '';
    private $message = '';
    private $response = array();

    public function __construct() {
        
    }

    public function postGuzzleRequest(Request $request) {        
        $input = $request->all();
        $validator = Validator::make($input, [
                    'zip' => 'required|numeric|digits:5'
        ]);
        if ($validator->fails()) {
            $this->message = $validator->errors();
            $this->status = 0;
        } else {
            
            try {
            
            $zip = $request->zip;
            $appid = "caa55aef0d63da8a7e1d7d5197bc253a";
            $base_url = "https://api.openweathermap.org/data/2.5/weather?zip=$zip,us&appid=$appid";
            $client = new \GuzzleHttp\Client();
            $response = $client->get($base_url);
           
            $this->response = json_decode($response->getBody(), true);
            $this->message = 'Records found successfully !';
            $this->status = 1;
            } catch (BadResponseException $e) {
            $this->response ='';
            $this->message = 'city not found !';
            $this->status = 0;        
            }
        }
        return response()->json(['status' => $this->status, 'message' => $this->message, 'response' => $this->response], $this->HTTP_status);
    }

}
