<?php

require_once 'Conector.php';

function selecionaFornecedor() {
    $retorno = "";
    $stmt = conectar()->prepare('SELECT id, nome FROM fornecedor;');
    //a variável $stmt, stantment, recebe a query, com a classe PDO recebendo o preparando a execução
    $stmt->execute(); //$stmt executa a query usando de uma função da classe PDO
    //enquanto houver registros irá executar o comando echo, criando uma tabela com os dados recebidos da execução da query
    while ($registro = $stmt->fetch()) {
        $retorno .= "<option value=" . $registro["id"] . ">" . $registro["nome"] . "</option>";      //cria tag option contendo no value o id e no conteúdo da tag o nome do fornecedor
    }
    return $retorno;
}

function cadastrarProduto($cod, $marca, $modelo, $cor, $preco, $fornecedor, $data, $dataAtual) {
    $stmt = conectar()->prepare('INSERT INTO produto VALUES '                        //depois de muitas tentativas, funcionou
            . '(' . $cod . ',"' . $marca . '","' . $modelo . '","' . $cor . '","' . $preco . '",' . $fornecedor . ',"' . $data . '","' . $dataAtual . '");');
    $stmt->execute();
}

function cadastrarFornecedor($nome, $telefone, $email, $rua, $numero, $cidade, $estado, $cep) {
    $stmt = conectar()->prepare("INSERT INTO fornecedor(id,nome,telefone,emails,rua,num_end,cidade,estado,cep) "
            . "VALUES (default,'$nome','$telefone','$email','$rua','$numero','$cidade','$estado','$cep'); ");
    $stmt->execute();
}

function buscarRegistrosTabela() {
    $retorno = "";
    $stmt = conectar()->prepare('SELECT p.cod, p.marca, p.modelo, p.cor, p.preco, p.cod_fornecedor, f.nome FROM produto as p, fornecedor as f WHERE p.cod_fornecedor = f.id;');
    //a variável $stmt, stantment, recebe a query, com a classe PDO recebendo o preparando a execução
    $stmt->execute(); //$stmt executa a query usando de uma função da classe PDO
    //enquanto houver registros irá executar o comando echo, criando uma tabela com os dados recebidos da execução da query
    while ($registro = $stmt->fetch()) {
        $retorno .= "<tr><td>" . $registro["cod"] . "</td><td>" . $registro["marca"] . "</td><td>" . $registro["modelo"] . "</td><td>" . 
                $registro["cor"] . "</td><td>" . $registro["preco"] . "</td><td>" . $registro["nome"] . '</td><td><a href="alterardados.php?cod='.$registro["cod"]
                .'">Alterar Dados</a> - <a href="excluir.php?cod='.$registro["cod"].'">Excluir</a></td></tr>';
    }
    return $retorno;
}

function pesquisaPorCod($cod){
    $stmt = conectar()->prepare('SELECT p.cod, p.marca, p.modelo, p.cor, p.preco, p.data_fabricacao, p.data_cadastro, f.nome FROM produto as p, fornecedor as f WHERE p.cod_fornecedor = f.id AND p.cod = '.$cod.';');
    $stmt->execute();
    while ($registro = $stmt->fetch()){
        $retorno[0] = $registro["cod"];
        $retorno[1] = $registro["marca"];
        $retorno[2] = $registro["modelo"];
        $retorno[3] = $registro["cor"];
        $retorno[4] = $registro["preco"];
        $retorno[5] = $registro["data_fabricacao"];
        $retorno[6] = $registro["data_cadastro"];
        $retorno[7] = $registro["nome"];
    }
    
    return $retorno;
}

function deletarRegistro($cod){
    $stmt = conectar()->prepare("DELETE FROM produto WHERE cod = ? ;");
    $stmt->bindParam(1, $cod, PDO::PARAM_INT);
    if($stmt->execute()){
        echo 'Registro excluido com sucesso!';
    }else{
        throw new PDOException("Erro!");
    }
}

?>