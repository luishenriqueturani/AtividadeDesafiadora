<?php

require_once 'CRUD.php';
$cod = $_REQUEST["cod"];
try {
    $query = 'UPDATE produto SET ';//uma variável que inicia com parte do comando da query

    $marca = isset($_REQUEST['inputMarca']) ? $_REQUEST['inputMarca'] : null;                       //aqui, via POST vem os valores dos campos de imput
    $modelo = isset($_REQUEST['inputModelo']) ? $_REQUEST['inputModelo'] : null;                    //caso algum deles não tenha sido preenchido é dado o valor de null
    $cor = isset($_REQUEST['inputCor']) ? $_REQUEST['inputCor'] : null;
    $preco = isset($_REQUEST['inputPreco']) ? $_REQUEST['inputPreco'] : null;
    $dataFab = isset($_REQUEST['input-data-fab']) ? $_REQUEST['input-data-fab'] : null;
    $dataCad = isset($_REQUEST['input-data-cad']) ? $_REQUEST['input-data-cad'] : null;
    $fornecedor = isset($_REQUEST['select-fornecedor']) ? $_REQUEST['select-fornecedor'] : null;    //este campo dificilmente será null, ele pode ter o valor da comparação do if
    if($fornecedor == "Escolha o fornecedor"){                                                      //assim há esta comparação, para o caso de ter este valor
        $fornecedor = null;                                                                         //ser atribuido o valor de null, impedindo um grande bug
    }
    
    
    if($marca != null){                         //é para todos, se a variável não está nula, roda uma function com o cod e o valor a ser alterado por parâmetro
        alterarMarca($cod, $marca);   
    }
    if($modelo != null){
        alterarModelo($cod, $modelo);
    }
    if($cor != null){
        alterarCor($cod, $cor);
    }
    if($preco != null){
        alterarPreco($cod, $preco);
    }
    if($dataFab != null){
        alterarDataFab($cod, $dataFab);
    }
    if($dataCad != null){
        alterarDataCad($cod, $dataCad);
    }
    if($fornecedor != null){
        alterarFornecedor($cod, $fornecedor);
    }
    sleep(5); //esse tempo é apenas para eu ter certeza de que caiu aqui
    header("Location: index.php");//envia o usuário para a tela inicial
    
} catch (Exception $ex) {
    echo "Erro: $ex";                                   //essa mensagem eu estava vendo o tempo inteiro quando tentava fazer com botão para cada campo
}                                                       //fazendo com essa montueira de ifelse não vi nenhuma vez
?>