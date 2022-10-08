<?php

namespace App;

class FareController{
    
    

    public function __construct(
        private OperatorService $_operatorService = new OperatorService(),
        private FareService $_fareService = new FareService()
    ){}

    public function createFare(Fare $fare, string $operatorCode):void{
        $selectedOperator = $this->_operatorService->getOperatorByCode($operatorCode);
        
        if($selectedOperator === false){
            throw new \Exception("A taxa não tem operadora existente", 1);
            
        }
        else{
            $fare->setOperatorId($selectedOperator->getId());
        }

        if(!$this->_fareService->validateFare($fare)){
            throw new \Exception("A tarifa não pode ser aplicada nessa mesma operadora", 1);
            
        }
        
        $this->_fareService->create($fare);
    }

}