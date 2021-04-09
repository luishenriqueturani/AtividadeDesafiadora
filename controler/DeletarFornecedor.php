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
require_once '../model/CRUD.php';

$id = $_POST["id"]; //recebe via post o id do fornecedor

if ($id != null) {//se por um acaso deu algum erro
    try {
        if (verificaRelacaoForProd($id) > 0) {//verifica se o id tem relação com algum registro de produtos, pois é chave estrangeira naquela tabela. Se o contador for maior que 0
            //significa que possui cadastros usando ele
            echo $gui->gerarInformativo("Atenção!", "Não é possível deletar, pois existem $id registros de produtos vinculados com este fornecedor.");
            //se tiver relação, mostra mensagem de erro
        } else {//senão
            if (deletarFornecedor($id)) {//executa o comando, tendo retorno positivo da query
                echo $gui->gerarInformativo("Deletado", "O fornecedor foi deletado com Sucesso!"); //chama função que mostra um modal com as informações passadas por parâmetro
                header("refresh: 3; ../view/cadastrarFornecedor.php"); //manda o usuário para a tela inicial
            } else {//se o retorno for negativo
                throw new PDOException("Erro!"); //lança a exceção do erro ocorrido
                header("refresh: 3; ../view/index.php");            //após 3 segundos é transferido para a tela inicial
            }
        }
    } catch (PDOException $ex) {//se o try catch encontrar erro
        echo $gui->gerarInformativo("Erro! :( ", "$ex");    //a função agora é usada para mostrar o conteúdo do erro
        header("refresh: 3; ../view/index.php");            //após 3 segundos é transferido para a tela inicial
    }
} else {//se der algum erro com o id enviado por post
    echo $gui->gerarInformativo("Erro! :( ", "Houve um erro com o ID necessário para a operação!");
}
