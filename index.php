<?php

require __DIR__ . '/vendor/autoload.php';

use App\DataFiller;
use App\Fare;
use App\FareController;
use App\Operator;
use App\OperatorController;
use App\OperatorService;



$operatorCodeInput = $_GET['operatorCodeInput'];

$opService = new OperatorService();

$operatorController = new OperatorController($opService);

DataFiller::fillOperators($operatorController);


$fareController = new FareController($opService);

DataFiller::fillFares($fareController);

$fare = new Fare();
$fare->setId(random_bytes(32));

$fare->setStatus($_GET['status']);
$fare->setValue($_GET['value']);
$fare->setMonths(5);


$fareController->createFare($fare, $operatorCodeInput);

echo 'cadastrado com sucesso';

