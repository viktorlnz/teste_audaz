<?php

namespace App;

class OperatorService{
    
    public function __construct(
        public Repository $_repository = new Repository()
    ){}

    public function getOperatorById(string $id):Operator|false{
        $selectedOperator = $this->_repository->getById($id);

        return $selectedOperator;
    }

    public function getOperatorByCode(string $code):Operator|false{
        $operators = $this->_repository->getAll();

        $selectedOperator = false;

        foreach ($operators as $operator) {
            if($operator->getCode() === $code){
                $selectedOperator = $operator;
                break;
            }
        }

        return $selectedOperator;
    }

    public function getOperators():array{
        $operators = $this->_repository->getAll();

        return $operators;
    }

    public function create(Operator $insertingOperator){
        $this->_repository->insert($insertingOperator);
    }

    public function update(Operator $updatingOperator){
        $this->_repository->update($updatingOperator);
    }
}