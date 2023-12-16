<?php

namespace Classes\PTT;

use Interfaces\IBarcode;

class PTTBarcode implements IBarcode
{

    public function createBarcode ()
    {
        echo "Ptt Cargo Barcode Created".PHP_EOL;
    }
}