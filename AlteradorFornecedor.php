<?php

require_once './CRUD.php';

try {
    $id = $_POST["id"];
    $nome = isset($_REQUEST['inputNome']) ? $_REQUEST['inputNome'] : null;
    $telefone = isset($_REQUEST['inputTelefone']) ? $_REQUEST['inputTelefone'] : null;
    $email = isset($_REQUEST['inputEmail']) ? $_REQUEST['inputEmail'] : null;
    $rua = isset($_REQUEST['rua']) ? $_REQUEST['rua'] : null;
    $numero = isset($_REQUEST['num']) ? $_REQUEST['num'] : null;
    $cidade = isset($_REQUEST['cidade']) ? $_REQUEST['cidade'] : null;
    $estado = isset($_REQUEST['estado']) ? $_REQUEST['estado'] : null;
    $cep = isset($_REQUEST['inputCEP']) ? $_REQUEST['inputCEP'] : null;
    
    if($nome != null){
        alterarFornecedorNome($id, $nome);
    }
    if($telefone != null){
        alterarFornecedorTelefone($id, $telefone);
    }
    if($email != null){
        alterarFornecedorEmail($id, $email);
    }
    if($rua != null){
        alterarFornecedorRua($id, $rua);
    }
    if($numero != null){
        alterarFornecedorNumero($id, $numero);
    }
    if($cidade != null){
        alterarFornecedorCidade($id, $cidade);
    }
    if($estado != null){
        alterarFornecedorEstado($id, $estado);
    }
    if($cep != null){
        alterarFornecedorCep($id, $cep);
    }
    
    sleep(5); //esse tempo é apenas para eu ter certeza de que caiu aqui
    header("Location: cadastrarFornecedor.php");
} catch (Exception $ex) {
    echo "$ex";
}
