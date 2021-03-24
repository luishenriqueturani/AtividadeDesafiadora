<?php

require_once './CRUD.php';

if (isset($_POST["deleta-dados"])) {
    try {
        $cod = $_POST["inputCod"];
        if ($cod != null) {
            deletarRegistro($cod);
        } else {
            echo "O maldito é null";
        }
    } catch (PDOException $ex) {
        echo 'Erro: ' . $ex;
    }
}

