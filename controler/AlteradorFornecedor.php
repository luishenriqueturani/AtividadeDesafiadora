<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
if ((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['usuario']);
    unset($_SESSION['senha']);
    //echo 'Ele invalidou usuário e senha';
    //echo $_SESSION['usuario'] . '<br>' . $_SESSION['senha'];
    header("Location: ../view/Login.php");
}
require_once '../model/CRUD.php';
require_once '../model/Fornecedor.php';
$forn = new Fornecedor();
try {
    $forn->setId($_POST["id"]);
    $forn->setNome(isset($_REQUEST['inputNome']) ? $_REQUEST['inputNome'] : null);
    $forn->setTelefone(isset($_REQUEST['inputTelefone']) ? $_REQUEST['inputTelefone'] : null);
    $forn->setEmail(isset($_REQUEST['inputEmail']) ? $_REQUEST['inputEmail'] : null);
    $forn->setRua(isset($_REQUEST['rua']) ? $_REQUEST['rua'] : null);
    $forn->setNumEndereco(isset($_REQUEST['num']) ? $_REQUEST['num'] : null);
    $forn->setCidade(isset($_REQUEST['cidade']) ? $_REQUEST['cidade'] : null);
    $forn->setEstado(isset($_REQUEST['estado']) ? $_REQUEST['estado'] : null);
    $forn->setCep(isset($_REQUEST['inputCEP']) ? $_REQUEST['inputCEP'] : null);
    
    
    if($forn->getNome() != null){                                  //para todos é igual, se o valor não for nulo, é chamado uma function levando por parâmetro o id e o valor a ser alterado
        alterarFornecedorNome($forn->getId(), $forn->getNome());
    }
    if($forn->getTelefone() != null){
        alterarFornecedorTelefone($forn->getId(), $forn->getTelefone());
    }
    if($forn->getEmail() != null){
        alterarFornecedorEmail($forn->getId(), $forn->getEmail());
    }
    if($forn->getRua() != null){
        alterarFornecedorRua($forn->getId(), $forn->getRua());
    }
    if($forn->getNumEndereco() != null){
        alterarFornecedorNumero($forn->getId(), $forn->getNumEndereco());
    }
    if($forn->getCidade() != null){
        alterarFornecedorCidade($forn->getId(), $forn->getCidade());
    }
    if($forn->getEstado() != null){
        alterarFornecedorEstado($forn->getId(), $forn->getEstado());
    }
    if($forn->getCep() != null){
        alterarFornecedorCep($forn->getId(), $forn->getCep());
    }
    echo 'Operação realizada com sucesso!';
    header("refresh: 3; ../view/cadastrarFornecedor.php");//envia o usuário para a tela de cadastro do fornecedor
} catch (Exception $ex) {
    echo "$ex";
}
