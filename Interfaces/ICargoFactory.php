<?php

namespace Interfaces;

interface ICargoFactory
{
    public function CalculateShipPrice() : ICalculate;
    public function CreateBarcode() : IBarcode;

}