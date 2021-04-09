<?php

require_once '../model/CRUD.php';
require_once '../model/Usuarios.php';
require_once '../view/GUI.php';

$gui = new GUI();
$user = new Usuarios();

try {
    $user->setUsuario(isset($_POST['usuario']) ? $_POST['usuario'] : null);
    $user->setSenha(isset($_POST['senha']) ? $_POST['senha'] : null);
    if ($user->getSenha() == null || $user->getUsuario() == null) {
        echo $gui->gerarInformativo("Atenção", "Usuário e/ou senha nulos ou em branco!");
        header("refresh: 3; ../view/Login.php");
    } else {
        $contador = testarLogin($user->getUsuario(), $user->getSenha());
        if ($contador == 1) {
            session_start();
            $_SESSION['usuario'] = $user->getUsuario();
            $_SESSION['senha'] = $user->getSenha();
            echo $gui->gerarInformativo("Vamos começar", "Usuário e senha Válidos!");
            header("refresh: 3; ../view/index.php");
        } else {
            echo $gui->gerarInformativo("Atenção", "Usuário ou senha inválido!");
            header("refresh: 3; ../view/Login.php");
        }
    }
} catch (Exception $ex) {
    echo $ex;
}


