<?php

namespace App;

class IModel{
    protected string $id;

    public function getId(){
        return $this->id;
    }

    public function setId(string $id){
        $this->id = $id;
    }
}