<?php

require_once '../model/CRUD.php';
require_once '../model/Usuarios.php';

$user = new Usuarios();

try {
    $user->setUsuario(isset($_POST['usuario']) ? $_POST['usuario'] : null);
    $user->setSenha(isset($_POST['senha']) ? $_POST['senha'] : null);
    //echo $user->getUsuario().'<br>'.$user->getSenha().'<br>';
    if ($user->getSenha() == null || $user->getUsuario() == null) {
        header("Location: ../view/Login.php");
        //echo 'Usuario ou senha null';
    } else {
        $contador = testarLogin($user->getUsuario(), $user->getSenha());
        if ($contador == 1) {
            session_start();
            $_SESSION['usuario'] = $user->getUsuario();
            $_SESSION['senha'] = $user->getSenha();
            header("Location: ../view/index.php");
            //echo "Usuário e senha válidos";
        } else {
            //echo 'testar login voltou o valor '.$contador;
            unset($_SESSION['usuario']);
            unset($_SESSION['senha']);
            header("Location: ../view/Login.php");
        }
    }
} catch (Exception $ex) {
    echo $ex;
}


