<?php

namespace App;

class Operator extends IModel{
    private string $code;

    public function getCode(){
        return $this->code;
    }

    public function setCode(string $code){
        $this->code = $code;
    }
}