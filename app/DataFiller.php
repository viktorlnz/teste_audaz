<?php

namespace App;

//Criei essa classe para colocar alguns dados de teste

class DataFiller{

    public static function fillOperators(OperatorController $operatorController){

        $data = [
            ['code' => 'OP01'],
            ['code' => 'OP02'],
            ['code' => 'OP03'],
            ['code' => 'OP04'],
            ['code' => 'OP05']
        ];

        foreach ($data as $d) {
            $operator = new Operator();
            $operator->setId(random_bytes(32));
            $operator->setCode($d['code']);
            
            $operatorController->createOperator($operator);
        }
    }

    public static function fillFares(FareController $fareController){
        $data = [
            [
                'operatorCode' => 'OP01',
                'status' => 1,
                'value' => 3.14,
                'months' => 8
            ],
            [
                'operatorCode' => 'OP01',
                'status' => 1,
                'value' => 3.24,
                'months' => 3
            ],
            [
                'operatorCode' => 'OP02',
                'status' => 1,
                'value' => 3.48,
                'months' => 1
            ],
            [
                'operatorCode' => 'OP03',
                'status' => 1,
                'value' => 8,
                'months' => 0
            ],
            [
                'operatorCode' => 'OP04',
                'status' => 1,
                'value' => 12,
                'months' => 2
            ]
        ];

        foreach ($data as $d) {
            $fare = new Fare('', $d['status'], $d['value'], $d['months'], random_bytes(32));

            $fareController->createFare($fare, $d['operatorCode']);
        }
    }
}