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
require_once '../model/Usuarios.php';

$user = new Usuarios();

try {
    $user->setUsuario(isset($_POST['usuario']) ? $_POST['usuario'] : null);
    $user->setSenha(isset($_POST['senha']) ? $_POST['senha'] : null);
    //echo $user->getUsuario().'<br>'.$user->getSenha().'<br>';
    if ($user->getSenha() == null || $user->getUsuario() == null) {
        echo 'Usuário ou senha em branco';
        header("refresh: 3; ../view/CadUsuario.php");
    } else {
        echo $gui->gerarInformativo("", cadastrarUsuario($user->getUsuario(), $user->getSenha()));//chama função de mostrar mensagem, enviando por parâmetro uma função do crud
                                                                                                            //que verifica e realiza o cadastro do usuário retornando uma mensagem
                                                                                                            //que é mostrada ao usuário em um modal
        header("refresh: 3; ../view/index.php");
    }
} catch (Exception $ex) {
    echo $gui->gerarInformativo("Erro! :( ", "$ex");    //a função agora é usada para mostrar o conteúdo do erro
    header("refresh: 3; ../view/index.php");            //após 3 segundos é transferido para a tela inicial
}

