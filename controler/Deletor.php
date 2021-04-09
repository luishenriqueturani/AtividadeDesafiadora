<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
if ((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['usuario']);
    unset($_SESSION['senha']);
    require_once '../view/GUI.php'; //chamado do gui
    $gui = new GUI(); //instância do objeto de gui
    echo $gui->gerarInformativo("Atenção", "Seu tempo de seção espirou ou não foi feito Login!"); //gera um modal informando a situação
    header("refresh: 3; ../view/Login.php"); //após aguardar 3 segundos transfere para a tela de login
}
//termina a verificação de session
require_once '../model/CRUD.php'; //requisição do CRUD

if (isset($_POST["deleta-dados"])) {//caso o botão seja precionado
    try {//try catch trata de um possível erro
        $cod = $_POST["inputCod"]; //o valor do cod vem via post
        if ($cod != null) {//se não for null, executa o código
            deletarRegistro($cod); //chama a função para deletar o registro com o código passado por parâmetro
            echo $gui->gerarInformativo("Deletado", "O fornecedor foi deletado com Sucesso!"); //chama função que mostra um modal com as informações passadas por parâmetro
            header("refresh: 3; ../view/cadastrarFornecedor.php"); //manda o usuário para a tela inicial
        } else {//se for null
            echo $gui->gerarInformativo("Houve um problema! :(", "O maldito do código é null, impedindo o prosseguimento da operação.");
            //mostra a mensagem mostrando a minha indignação pra fazer essa merd... funcionar
            header("refresh: 3; ../view/index.php");            //após 3 segundos é transferido para a tela inicial
        }
    } catch (PDOException $ex) {
        echo $gui->gerarInformativo("Erro! :( ", "$ex");    //a função agora é usada para mostrar o conteúdo do erro
        header("refresh: 3; ../view/index.php");            //após 3 segundos é transferido para a tela inicial
    }
}


