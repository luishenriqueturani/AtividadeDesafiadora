<?php
class Produtos{
    private $cod, $marca, $modelo, $cor, $preco, $codFornecedor, $dataFabricacao, $dataCadastro;//as variáveis
    //abaixo os get e set
    function getCod() {
        return $this->cod;
    }

    function getMarca() {
        return $this->marca;
    }

    function getModelo() {
        return $this->modelo;
    }

    function getCor() {
        return $this->cor;
    }

    function getPreco() {
        return $this->preco;
    }

    function getCodFornecedor() {
        return $this->codFornecedor;
    }

    function getDataFabricacao() {
        return $this->dataFabricacao;
    }

    function getDataCadastro() {
        return $this->dataCadastro;
    }

    function setCod($cod): void {
        $this->cod = $cod;
    }

    function setMarca($marca): void {
        $this->marca = $marca;
    }

    function setModelo($modelo): void {
        $this->modelo = $modelo;
    }

    function setCor($cor): void {
        $this->cor = $cor;
    }

    function setPreco($preco): void {
        $this->preco = $preco;
    }

    function setCodFornecedor($codFornecedor): void {
        $this->codFornecedor = $codFornecedor;
    }

    function setDataFabricacao($dataFabricacao): void {
        $this->dataFabricacao = $dataFabricacao;
    }

    function setDataCadastro($dataCadastro): void {
        $this->dataCadastro = $dataCadastro;
    }
    //function para fazer a limpeza das variáveis
    function limpar(): void{
        $this->cod = null;
        $this->marca = null;
        $this->modelo = null;
        $this->cor = null;
        $this->preco = null;
        $this->codFornecedor = null;
        $this->dataFabricacao = null;
        $this->dataCadastro = null;
    }
    
    
}
