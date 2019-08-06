<?php

namespace App\Calculations;

use App\Models\Insurance;

class insuranceCost {

    protected $insurance;

    protected $principle;

    
    /**
     * Constructor.
     *
     * @param float $principle
     */
    public function __construct($principle)
    {
        $this->principle = $principle;
    }


    /**
     * Calculates 
     *
     * @return float
     */
    public function insuranceCalc()
    {
        
      // 7.5%XPrice  
      $insurance_cost = 0.0;

      $insurance_cost = (7.5 / 100) * $this->principle;

//dd($interest);
        return $insurance_cost;
    }
    
}