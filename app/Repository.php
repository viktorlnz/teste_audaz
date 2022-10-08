<?php

namespace App;

class Repository{

    public function __construct(
        private array $_fakeDatabase = []
    ){}

    public function insert(IModel $model):void{
        if($model->getId() == ''){
            throw new \Exception("Não é possível salver um registro com Id não preenchido", 1);
        }

        $modelAlreadExists = $this->match($model);

        if($modelAlreadExists){
            throw new \Exception("Já existe um registro com o Id '" . $model->id);
        }

        array_push($this->_fakeDatabase, $model); 
    }

    public function update(IModel $model):void{
        $updatingModel = $this->getKey($model);

        if($updatingModel == false){
            throw new \Exception("Não há registros com Id '".$model->id."'");
        }

        unset($this->_fakeDatabase[$updatingModel]);
        array_push($this->_fakeDatabase, $model);
    }

    public function getById(string $id):IModel|bool{
        $model = $this->searchIModel($id);

        return $model;
    }

    public function getAll():array{
        return $this->_fakeDatabase;
    }
    

    private function match(IModel $model):bool{
        foreach ($this->_fakeDatabase as $data) {
            if($data->getId() === $model->getId()){
                return true;
            }
        }

        return false;
    }

    private function getKey(IModel $model):int{
        foreach ($this->_fakeDatabase as $key => $data) {
            if($data->id === $model->id){
                return $key;
            }
        }

        return false;
    }

    private function searchIModel(string $id):IModel|bool{
        foreach ($this->_fakeDatabase as $data) {
            if($data->id === $id){
                return $data;
            }
        }

        return false;
    }
}