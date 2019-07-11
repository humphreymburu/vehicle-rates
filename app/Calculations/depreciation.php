<?php

namespace App\Classes;

class depreciation {


    /**
     * The residual value.
     *
     * @var decimal
     */
    protected $residual;

    /**
     * The rate
     *
     * @var int
     */
    protected $life_span;

    /**
     * Constructor.
     *
     * @param float $rate
     * @param int   $life_span
     */
    public function __construct($rate = 50.00, $nights = 1)
    {
        $this->rate = $rate;
        $this->nights = $nights;
    }


}

