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
        echo cadastrarUsuario($user->getUsuario(), $user->getSenha());

        header("refresh: 3; ../view/index.php");
    }
} catch (Exception $ex) {
    echo $ex;
    header("refresh: 3; ../view/index.php");
}

