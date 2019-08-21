<?php

namespace App\Http\Controllers\Frontend;
//use App\Http\Controllers\Frontend\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Frontend\Auth\VehicleRepository;
use App\Repositories\Frontend\Auth\DepreciationRepository;
use App\Http\Requests\Frontend\Vehicle\VehicleRequest;
use App\Calculations\depreciationCost;
use App\Calculations\interestCost;
use App\Calculations\insuranceCost;
use App\Calculations\runningCost;

class UssdController extends Controller
{
    
    public function test() {
        $hello = "Hello World";

       // $hello = { 'yes', 'no'}
        $cars = array("Volvo", "BMW", "Toyota");

        return $cars;
    }

    public function cal($number) {
        $answer = $number + $number;

        return $answer;
    }

}
