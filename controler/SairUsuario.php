<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

unset($_SESSION['usuario']);
unset($_SESSION['senha']);
header("Location: ../view/index.php");





