<?php
//constantes com os valores para a conexão
    define("DSN", "mysql");
    define("SERVIDOR", "localhost");
    define("USUARIO", "root");
    define("SENHA", null);
    define("BANCODEDADOS", "atividade_desafiadora");
function conectar() {
    
    $conn = new PDO(DSN.':host='.SERVIDOR.';dbname='.BANCODEDADOS,USUARIO,SENHA);//a conexão é estabelecida, recebendo as constantes como valor nos seus campos
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//seta atributos para tratar os erros
    return $conn;//retorna a conexão, retornando todo o Objeto da conexão
}

?>