<?php

namespace App;

class Fare extends IModel{
    
    public function __construct(
        private string $operatorId = '',
        private int $status = 0,
        private float $value = 0,
        private int $months = 0,
        string $id = ''
    ){
        $this->setId($id);
    }

    public function getOperatorId(){
        return $this->operatorId;
    }

    public function setOperatorId(string $operatorId){
        $this->operatorId = $operatorId;
    }

    public function getStatus(){
        return $this->status;
    }

    public function setStatus(int $status){
        $this->status = $status;
    }

    
    public function getValue(){
        return $this->value;
    }

    public function setValue(float $value){
        $this->value = $value;
    }

    public function getMonths(){
        return $this->months;
    }

    public function setMonths(int $months){
        $this->months = $months;
    }
}