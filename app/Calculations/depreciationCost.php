<?php

namespace App\Calculations;
use App\Models\Depreciation;

class depreciationCost {


    

    const FIVE_TON = '5 TON';
    const SEVEN_TON = '7 TON';
    const NINE_TON = '9 TON'; 

         /**
     * The rate
     *
     * @var float
     */
    protected $depreciation_value;


    /**
     * Constructor.
     *
     * @param float $price
     */
    public function __construct($price)
    {
        $this->price = $price;
        //$this->vehicle = $vehicle;
        //$this->depreciation_value = $depreciation_value;
    }


    /**
     * Calculates 
     *
     * @return float
     */
    public function depreciateCalc()
    {
        
         $depreciation_value = 0.0;


         $five = 'FIVE_TON'; 
         $seven = 'SEVEN_TON'; 
         $nine =  'NINE_TON';

         $default = $five && $seven && $nine;

         $percentage_under = 40;
         $percentage_over  = 35;
         
         //dd($this->price);
         

         //gettype($price);

         
         //$price_one = (int)$price;
         //$price_two= (float)$price_one;

         if (!$default) {
            $depreciation_value = $this->price - (40 / 100) * $this->price;
         } else {
            $depreciation_value = $this->price - (35 / 100) * $this->price;
        }
        
        return $depreciation_value;
    }


}

