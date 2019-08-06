<?php

namespace App\Calculations;

use App\Models\Capacity;

class runningCost {

  
    protected $fuel;

    protected $distance;



    
    /**
     * Constructor.
     *
     * @param integer fuel, principle
     */
    public function __construct($fuel, $distance)
    {
        $this->distance = $distance;
        $this->fuel = $fuel;
    }


    /**
     * Calculates 
     *
     * @return float
     */
    public function fuelCalc()
    {
        
            // fuel/distance by cc
        
        $fuel_costs = 0.0;
        
        $fuel_costs = round ($this->fuel / $this->distance, 2);
        

        return $fuel_costs;
    }


    


    
}

