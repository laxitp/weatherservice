<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Config;
use Redirect;
use Illuminate\Support\Facades\Input;
use GuzzleHttp\Client;
use Validator;

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
                    'zip' => 'required',
                    'appid' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
            $this->message = $validator->errors();
            $this->status = 0;
        } else {
            $client = new \GuzzleHttp\Client(["base_uri" => "https://samples.openweathermap.org"]);
            $options = [
                'form_params' => [
                    "zip" => $request->zip,
                    "appid" => $request->appid
                ]
            ];
            $response = $client->get("/data/2.5/weather", $options);
            $this->response = json_decode($response->getBody(),true);
            $this->message = 'Records found successfully !';
            $this->status = 1;
        }
        return response()->json(['status' => $this->status, 'message' => $this->message, 'response' => $this->response], $this->HTTP_status);
    }

}
