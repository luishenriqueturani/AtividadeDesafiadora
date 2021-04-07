<?php

class Usuarios{
    private $usuario, $senha;
    
    function getUsuario() {
        return $this->usuario;
    }

    function getSenha() {
        return $this->senha;
    }

    function setUsuario($usuario): void {
        $this->usuario = $usuario;
    }

    function setSenha($senha): void {
        $this->senha = $senha;
    }


    
    
}
