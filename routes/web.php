<?php

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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@index');

Route::get('/cache-clear', function () {
    Artisan::call('optimize');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    return redirect()->route('home')->with('message', 'Cache cleared successfully !');
})->name('cacheClear');


// Web Services @//

Route::Group(['prefix' => '/api/v1'], function () {
    Route::post('/getWeatherInfo', 'Api\WeatherApi@postGuzzleRequest');
});
