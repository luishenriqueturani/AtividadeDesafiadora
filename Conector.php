<?php

    define("DSN", "mysql");
    define("SERVIDOR", "localhost");
    define("USUARIO", "root");
    define("SENHA", null);
    define("BANCODEDADOS", "atividade_desafiadora");
function conectar() {
    
    $conn = new PDO(DSN.':host='.SERVIDOR.';dbname='.BANCODEDADOS,USUARIO,SENHA);//a conexão é estabelecida, recebendo as constantes como valor nos seus campos
    return $conn;
}

?>