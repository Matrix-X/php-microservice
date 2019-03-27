<?php
/**
 * Created by PhpStorm.
 * User: michaelhu
 * Date: 2019/3/26
 * Time: 10:03 PM
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class LocationController extends Controller
{

    const ROUND_DECIMALS = 2;
    public static $conversionRates = [
        'km'    => 1.853159616,
        'mile'  => 1.1515
    ];
    protected function convertDistance($distance, $unit = 'km')
    {
        switch (strtolower($unit)) {
            case 'mile':
                $distance = $distance * self::$conversionRates['mile'];
                break;
            default :
                $distance = $distance * self::$conversionRates['km'];
                break; }
        return round($distance, self::ROUND_DECIMALS);
    }


    public function getEuclideanDistance($pointA, $pointB, $unit = 'km')
    {
        $distance = sqrt(
            pow(abs($pointA['latitude'] - $pointB['latitude']), 2) +
            pow(abs($pointA['longitude'] - $pointB['longitude']), 2)
        );
        return $this->convertDistance($distance, $unit);
    }

    public function getDistance($pointA, $pointB, $unit = 'km')
    {
        return $this->getEuclideanDistance($pointA, $pointB, $unit);
    }

}