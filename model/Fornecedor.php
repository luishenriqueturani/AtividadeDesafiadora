<?php

class Fornecedor{
    private $id, $nome, $telefone, $email, $rua, $numEndereco, $cidade, $estado, $cep;//as variáveis
    //abaixo vem os get e set
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getEmail() {
        return $this->email;
    }

    function getRua() {
        return $this->rua;
    }

    function getNumEndereco() {
        return $this->numEndereco;
    }

    function getCidade() {
        return $this->cidade;
    }

    function getEstado() {
        return $this->estado;
    }

    function getCep() {
        return $this->cep;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setNome($nome): void {
        $this->nome = $nome;
    }

    function setTelefone($telefone): void {
        $this->telefone = $telefone;
    }

    function setEmail($email): void {
        $this->email = $email;
    }

    function setRua($rua): void {
        $this->rua = $rua;
    }

    function setNumEndereco($numEndereco): void {
        $this->numEndereco = $numEndereco;
    }

    function setCidade($cidade): void {
        $this->cidade = $cidade;
    }

    function setEstado($estado): void {
        $this->estado = $estado;
    }

    function setCep($cep): void {
        $this->cep = $cep;
    }
    //função para fazer a limpeza das variáveis
    function limpar(): void {
        $this->id = null;
        $this->nome = null;
        $this->telefone = null;
        $this->email = null;
        $this->rua = null;
        $this->numEndereco = null;
        $this->cidade = null;
        $this->estado = null;
        $this->cep = null;
    }

}

