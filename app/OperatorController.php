<?php

namespace App;

class OperatorController{
    
    public function __construct(
        private OperatorService $_operatorService = new OperatorService()
    ){}

    public function createOperator(Operator $operator):void{
        
        if($this->_operatorService->getOperatorByCode($operator->getCode())){
            throw new \Exception('O operador de código '.$operator->getCode().' já está registrado.');
        }

        $this->_operatorService->create($operator);
    }

}