<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
require_once '../view/GUI.php'; //chamado do gui
$gui = new GUI(); //instância do objeto de gui
if ((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['usuario']);
    unset($_SESSION['senha']);
    echo $gui->gerarInformativo("Atenção", "Seu tempo de seção espirou ou não foi feito Login!");//gera um modal informando a situação
    header("refresh: 3; ../view/Login.php");//após aguardar 3 segundos transfere para a tela de login
}
//termina a verificação de session


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
    echo $gui->gerarInformativo("Alterado", "Operação realizada com sucesso!");//chama função que mostra um modal com as informações passadas por parâmetro
    header("refresh: 3; ../view/cadastrarFornecedor.php");//envia o usuário para a tela de cadastro do fornecedor
} catch (Exception $ex) {
    echo $gui->gerarInformativo("Erro! :( ", "$ex");    //a função agora é usada para mostrar o conteúdo do erro
    header("refresh: 3; ../view/index.php");            //após 3 segundos é transferido para a tela inicial
}
