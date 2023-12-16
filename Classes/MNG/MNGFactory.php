<?php

namespace Classes\MNG;

use Interfaces\IBarcode;
use Interfaces\ICalculate;
use Interfaces\ICargoFactory;

class MNGFactory implements ICargoFactory
{

    public function CalculateShipPrice (): ICalculate
    {
        return new MNGShipment();
    }

    public function CreateBarcode (): IBarcode
    {
        return new MNGBarcode();
    }
}