<?php

class cadastroModel
{

    private $nome;
    private $email;
    private $telefone;
    private $senha;

    //construtores mágicos get e set
    public function __set($atributo, $valor)
    {
        return $this->$atributo = $valor;
    }

    public function __get($valor)
    {
        return $this->$valor;
    }
}
