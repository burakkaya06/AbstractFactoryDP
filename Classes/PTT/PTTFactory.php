<?php


namespace Classes\PTT;

use Interfaces\IBarcode;
use Interfaces\ICalculate;
use Interfaces\ICargoFactory;

class PTTFactory implements ICargoFactory
{

    public function CalculateShipPrice (): ICalculate
    {
        return new PTTShipment();
    }

    public function CreateBarcode (): IBarcode
    {
        return new PTTBarcode();
    }
}
