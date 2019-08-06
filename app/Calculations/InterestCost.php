<?php

namespace App\Calculations;

use App\Models\Depreciation;

class interestCost {

  
    protected $rate;

    protected $principle;

    protected $time;

    protected $power;

    protected $insurance;

    
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
    public function interestCalc()
    {
        
            // 70%XPrice X 16% Reducing Balance for 3 years plus 
        
        $insurance = 0.0;


        $rate = 16/100/12;
        $time = 3;
        $power= pow(1+$rate,$time);

        $principle_one = (70 / 100) * $this->principle;
        $interest = ($principle_one*$power*$rate)/($power-1);
        $interest = round($interest);
//dd($interest);
        return $interest;
    }


    public function hirePurchase() 
    {

       $hire = 0.0;
       // (S *(100 +I*100)^q-5)  <<where S=30% price, q=12*5 months, i=8,5/(100*12)>>

       $hp_rate = 8.5/100/12;
       $time = 12*5;
       $power_two= pow(1+$hp_rate,$time);

       $principle_two = (30 / 100) * $this->principle;
       $hire = ($principle_two*$power_two*$hp_rate)/($power_two-1);
       $hire = round($hire);

//dd($hire);

       return $hire;
    }


    
}

