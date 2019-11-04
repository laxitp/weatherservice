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
        return view('welcome');
    }

}
