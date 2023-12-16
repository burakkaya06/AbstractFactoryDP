<?php

namespace Classes\MNG;

use Interfaces\ICalculate;

class MNGShipment implements ICalculate
{

    public function calculateShipPrice ()
    {
        echo "MNG Cargo Price Calculated" . PHP_EOL;
    }
}