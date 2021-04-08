<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
if ((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['usuario']);
    unset($_SESSION['senha']);
    //echo 'Ele invalidou usuário e senha';
    //echo $_SESSION['usuario'] . '<br>' . $_SESSION['senha'];
    header("Location: Login.php");
}
require_once '../model/CRUD.php';

$id = $_POST["id"]; //recebe via post o id do fornecedor

if ($id != null) {//se por um acaso deu algum erro
    try {
        if (verificaRelacaoForProd($id) > 0) {//verifica se o id tem relação com algum registro de produtos, pois é chave estrangeira naquela tabela. Se o contador for maior que 0
            //significa que possui cadastros usando ele
            echo "Não é possível deletar, pois existem $id registros de produtos vinculados com este fornecedor."; //se tiver relação, mostra mensagem de erro
        } else {//senão
            if (deletarFornecedor($id)) {//executa o comando, tendo retorno positivo da query
                sleep(3); //espera 3 segundos
                header("Location: ../view/cadastrarFornecedor.php"); //e retorna para a tela de cadastro de fornecedor
            } else {//se o retorno for negativo
                throw new PDOException("Erro!"); //lança a exceção do erro ocorrido
            }
        }
    } catch (Exception $ex) {//se o try catch encontrar erro
        echo "Erro: $ex."; //mostra aqui
    }
} else {//se der algum erro com o id enviado por post
    echo 'Erro!';
}
