<?php

namespace Classes;

use Interfaces\ICargoFactory;

class CargoOperation
{

    /**
     * @var  ICargoFactory
     */
    private $cargoFactory = null;

    public function __construct (ICargoFactory $cargoFactory)
    {
        $this->cargoFactory = $cargoFactory;
    }

    public function calculateOperations ()
    {
        return $this->cargoFactory->CalculateShipPrice()->calculateShipPrice();
    }

    public function createBarcodeOperations ()
    {
        return $this->cargoFactory->CreateBarcode()->createBarcode();
    }


}