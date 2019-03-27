<?php
/**
 * Created by PhpStorm.
 * User: michaelhu
 * Date: 2019/3/26
 * Time: 10:10 PM
 */

use Laravel\Lumen\Testing\DatabaseTransactions;

class LocationControllerTest extends TestCase
{
    public function testDistance()
    {
        $realDistanceLondonAmsterdam = 358.06;
        $london = [
            'latitude'  => 51.50,
            'longitude' => -0.13
        ];
        $amsterdam = [
            'latitude'  => 52.37,
            'longitude' => 4.90
        ];
        $location = new App\Http\Controllers\LocationController();
        $calculatedDistance = $location->getDistance($london, $amsterdam);

        $this->assertClassHasStaticAttribute('conversionRates',
            App\Http\Controllers\LocationController::class);
        $this->assertEquals($realDistanceLondonAmsterdam,
            $calculatedDistance);

    }


    public function testClosestSecrets()
    {

    }
}
