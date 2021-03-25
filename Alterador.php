<?php
require_once 'CRUD.php';
$cod = $_REQUEST["cod"];
try {
    if (isset($_POST["alterar-marca"])) {
        alterarCadastro("marca", $cod, $_POST["input-marca"]);
    }
    if (isset($_POST["altera-modelo"])) {
        alterarCadastro("modelo", $cod, $_POST["input-modelo"]);
    }
    if (isset($_POST["altera-cor"])) {
        alterarCadastro("cor", $cod, $_POST["input-cor"]);
    }
    if (isset($_POST["altera-preco"])) {
        alterarCadastro("preco", $cod, $_POST["input-preco"]);
    }
    if (isset($_POST["altera-data-fab"])) {
        alterarCadastro("data_fabricacao", $cod, $_POST["input-data-fab"]);
    }
    if (isset($_POST["altera-data-cad"])) {
        alterarCadastro("data_cadastro", $cod, $_POST["input-data-cad"]);
    }
    if (isset($_POST["altera-fornecedor"])) {
        alterarCadastro("cod_fornecador", ($cod), $_POST["select-fornecedor"]);
    }
} catch (Exception $ex) {
    echo "Erro: $ex";
}
?>