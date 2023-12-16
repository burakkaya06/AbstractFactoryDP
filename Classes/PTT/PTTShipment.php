<?php

namespace Classes\PTT;

use Interfaces\ICalculate;

class PTTShipment implements ICalculate
{

    public function calculateShipPrice ()
    {
        echo "PTT Cargo Price Calculated".PHP_EOL;
    }
}