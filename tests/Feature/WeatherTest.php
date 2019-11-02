<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class WeatherTest extends TestCase {

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample() {
        $this->assertTrue(true);
    }

    public function testBasicExample()
    {
        $this->json('POST', 'https://samples.openweathermap.org/data/2.5/weather', ['zip' => '94040,us','appid' => 'b6907d289e10d714a6e88b30761fae22'])
             ->seeJson([
                 'created' => true,
             ]);
    }

}
