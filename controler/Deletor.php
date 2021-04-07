<?php
session_start();
if(isset($_SESSION['usuario']) == false){
    header("Location: Login.php");
}
require_once '../model/CRUD.php';//requisição do CRUD

if (isset($_POST["deleta-dados"])) {//caso o botão seja precionado
    try {//try catch trata de um possível erro
        $cod = $_POST["inputCod"];//o valor do cod vem via post
        if ($cod != null) {//se não for null, executa o código
            deletarRegistro($cod);//chama a função para deletar o registro com o código passado por parâmetro
        } else {//se for null
            echo "O maldito é null";//mostra a mensagem mostrando a minha indignação pra fazer essa merd... funcionar
        }
    } catch (PDOException $ex) {
        echo 'Erro: ' . $ex;//caso dê erro, imprime o erro, ví muito isso já
    }
}


