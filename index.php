<?php

require_once __DIR__ . '/vendor/autoload.php';

use Classes\CargoOperation;
use Classes\MNG\MNGFactory;
use Classes\PTT\PTTFactory;

$ptt = new PTTFactory();
$mng = new MNGFactory();

$cargo = new CargoOperation($ptt);
$cargo->calculateOperations();
$cargo->createBarcodeOperations();

$cargo = new CargoOperation($mng);
$cargo->calculateOperations();
$cargo->createBarcodeOperations();
