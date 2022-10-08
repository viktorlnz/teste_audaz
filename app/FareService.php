<?php

namespace App;

class FareService{

    public function __construct(
        private Repository $_repository = new Repository()
    ){}

    public function create(Fare $fare){
        $this->_repository->insert($fare);
    }

    public function update(Fare $fare){
        $this->_repository->update($fare);
    }

    public function getFareById(string $fareId):Fare{
        $fare = $this->_repository->getById($fareId);

        return $fare;
    }

    public function getFares():array{
        return $this->_repository->getAll();
    }

    public function validateFare(Fare $fare):bool{
        $operatorId = $fare->getOperatorId();

        $fares = $this->_repository->getAll();

        foreach ($fares as $key => $f) {
            if($f->getOperatorId() === $operatorId && $f->getStatus() === 1 && $f->getMonths() <= 6 && $f->getValue() == $fare->getValue()){
                return false;
            }
        }

        return true;
    }
}