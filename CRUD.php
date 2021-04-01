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
    $stmt = conectar()->prepare('INSERT INTO produto (cod,marca,modelo,cor,preco,cod_fornecedor,data_fabricacao,data_cadastro) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?);');
    $stmt->bindParam(1, $cod, PDO::PARAM_INT);
    $stmt->bindParam(2, $marca, PDO::PARAM_STR);
    $stmt->bindParam(3, $modelo, PDO::PARAM_STR);
    $stmt->bindParam(4, $cor, PDO::PARAM_STR);
    $stmt->bindParam(5, $preco, PDO::PARAM_STR);
    $stmt->bindParam(6, $fornecedor, PDO::PARAM_INT);
    $stmt->bindParam(7, $data, PDO::PARAM_STR);
    $stmt->bindParam(8, $dataAtual, PDO::PARAM_STR);

    $stmt->execute(); //a variável $stmt recebe o camando, no local do dado a ser cadastrado é concatenado a variável com o valor a ser cadastrado, a conexão é feita e o comando é preparado, depois é executado.
}

function cadastrarFornecedor($nome, $telefone, $email, $rua, $numero, $cidade, $estado, $cep) {
    $stmt = conectar()->prepare("INSERT INTO fornecedor(id,nome,telefone,emails,rua,num_end,cidade,estado,cep)"
            . "Values (default,?,?,?,?,?,?,?,?);");
    $stmt->bindParam(1, $nome, PDO::PARAM_STR);
    $stmt->bindParam(2, $telefone, PDO::PARAM_STR);
    $stmt->bindParam(3, $email, PDO::PARAM_STR);
    $stmt->bindParam(4, $rua, PDO::PARAM_STR);
    $stmt->bindParam(5, $numero, PDO::PARAM_STR);
    $stmt->bindParam(6, $cidade, PDO::PARAM_STR);
    $stmt->bindParam(7, $estado, PDO::PARAM_STR);
    $stmt->bindParam(8, $cep, PDO::PARAM_STR);
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
                $registro["cor"] . "</td><td>" . $registro["preco"] . "</td><td>" . $registro["nome"] . '</td><td><div class="modal-footer"><form action="alterardados.php" method="POST">'
                . '<input type="hidden" value="' . $registro["cod"] . '" name="cod">'
                . '<button type="submit" name="buttonAlterar' . $registro["cod"] . '" class="btn btn-primary">alterar</button></form>'
                . '<form action="excluir.php" method="POST">'
                . '<input type="hidden" value="' . $registro["cod"] . '" name="cod">'
                . '<button type="submit" name="buttonDeletar' . $registro["cod"] . '" class="btn btn-secundary">Deletar</button>'
                . '</form></div></td></tr>';
    }
    /* while ($registro = $stmt->fetch()) {
      $retorno .= "<tr><td>" . $registro["cod"] . "</td><td>" . $registro["marca"] . "</td><td>" . $registro["modelo"] . "</td><td>" .
      $registro["cor"] . "</td><td>" . $registro["preco"] . "</td><td>" . $registro["nome"] . '</td><td><a href="alterardados.php?cod=' . $registro["cod"]
      . '">Alterar Dados</a> - <a href="excluir.php?cod=' . $registro["cod"] . '">Excluir</a></td></tr>';
      } */
    return $retorno;
}

function pesquisaPorCod($cod) {
    $stmt = conectar()->prepare('SELECT p.cod, p.marca, p.modelo, p.cor, p.preco, p.data_fabricacao, p.data_cadastro, f.nome FROM produto as p, fornecedor as f WHERE p.cod_fornecedor = f.id AND p.cod = ? ;');
    $stmt->bindParam(1, $cod, PDO::PARAM_INT);//na minha opinião, não precisava usar o bindParam para incerir o valor, pois ele é controlado pelo sistema via POST, o usuário não tem acesso a ele, mas...
    $stmt->execute();
    while ($registro = $stmt->fetch()) {
        $retorno[0] = $registro["cod"]; //é feito a pesquisa, da mesma forma como nos outros comandos, o retorno é dado e armazenado no array de nome $retorno[].
        $retorno[1] = $registro["marca"]; //foi feito dessa forma, com cada campo sendo feito manualmente para se ter mais controle dos dados
        $retorno[2] = $registro["modelo"];
        $retorno[3] = $registro["cor"];
        $retorno[4] = $registro["preco"];
        $retorno[5] = $registro["data_fabricacao"];
        $retorno[6] = $registro["data_cadastro"];
        $retorno[7] = $registro["nome"];
    }

    return $retorno;
}

function deletarRegistro($cod) {
    $stmt = conectar()->prepare("DELETE FROM produto WHERE cod = ? ;"); //$stmt recebe o comando com a conexão e a preparação da query, no local do valor de referência de pesquisa vem apenas um ?
    $stmt->bindParam(1, $cod, PDO::PARAM_INT); //o comando bindParam recebe um índice para buscar o ?, o valor que ele põe no lugar
    if ($stmt->execute()) {//se o comando foi executado executa os códigos, senão...
        sleep(5); //esse tempo é apenas para eu ter serteza de que caiu aqui
        header("Location: index.php"); //o usuário é enviádo para a tela inicial após os 5 segundos
    } else {//... executa o um código que lança uma mensagem com as informações do erro
        throw new PDOException("Erro!");
    }
}

function alterarMarca($cod, $marca) {
    $stmt = conectar()->prepare("UPDATE produto SET marca = ? WHERE cod = ?;"); 
    $stmt->bindParam(1, $marca, PDO::PARAM_STR);
    $stmt->bindParam(2, $cod, PDO::PARAM_INT);
    if (!$stmt->execute()) {//se não for possível executar ela, é lançado a mensagem de erro
        throw new PDOException("Erro!");
    }
}
function alterarModelo($cod, $modelo) {
    $stmt = conectar()->prepare("UPDATE produto SET modelo = ? WHERE cod = ?;"); 
    $stmt->bindParam(1, $modelo, PDO::PARAM_STR);
    $stmt->bindParam(2, $cod, PDO::PARAM_INT);
    if (!$stmt->execute()) {//se não for possível executar ela, é lançado a mensagem de erro
        throw new PDOException("Erro!");
    }
}
function alterarCor($cod, $cor) {
    $stmt = conectar()->prepare("UPDATE produto SET cor = ? WHERE cod = ?;"); 
    $stmt->bindParam(1, $cor, PDO::PARAM_STR);
    $stmt->bindParam(2, $cod, PDO::PARAM_INT);
    if (!$stmt->execute()) {//se não for possível executar ela, é lançado a mensagem de erro
        throw new PDOException("Erro!");
    }
}
function alterarPreco($cod, $preco) {
    $stmt = conectar()->prepare("UPDATE produto SET preco = ? WHERE cod = ?;"); 
    $stmt->bindParam(1, $preco, PDO::PARAM_STR);
    $stmt->bindParam(2, $cod, PDO::PARAM_INT);
    if (!$stmt->execute()) {//se não for possível executar ela, é lançado a mensagem de erro
        throw new PDOException("Erro!");
    }
}
function alterarDataCad($cod, $dataCad) {
    $stmt = conectar()->prepare("UPDATE produto SET data_cadastro = ? WHERE cod = ?;"); 
    $stmt->bindParam(1, $dataCad, PDO::PARAM_STR);
    $stmt->bindParam(2, $cod, PDO::PARAM_INT);
    if (!$stmt->execute()) {//se não for possível executar ela, é lançado a mensagem de erro
        throw new PDOException("Erro!");
    }
}
function alterarDataFab($cod, $dataFab) {
    $stmt = conectar()->prepare("UPDATE produto SET data_fabricacao = ? WHERE cod = ?;"); 
    $stmt->bindParam(1, $dataFab, PDO::PARAM_STR);
    $stmt->bindParam(2, $cod, PDO::PARAM_INT);
    if (!$stmt->execute()) {//se não for possível executar ela, é lançado a mensagem de erro
        throw new PDOException("Erro!");
    }
}
function alterarFornecedor($cod, $fornecedor) {
    $stmt = conectar()->prepare("UPDATE produto SET cod_fornecedor = ? WHERE cod = ?;"); 
    $stmt->bindParam(1, $fornecedor, PDO::PARAM_STR);
    $stmt->bindParam(2, $cod, PDO::PARAM_INT);
    if (!$stmt->execute()) {//se não for possível executar ela, é lançado a mensagem de erro
        throw new PDOException("Erro!");
    }
}

function pesquisarCampos($pesquisa, $campo) {
    if ($campo == "cod") {//os if e elseif verificam o campo a ser pesquisado
        $retorno = ""; //variável vasia que irá receber o resultado da pesquisa

        if (is_numeric($pesquisa)) {//esse if testa a variável para verificar se é uma string com apenas valores numéricos
            $stmt = conectar()->prepare("SELECT p.cod, p.marca, p.modelo, p.cor, p.preco, p.cod_fornecedor, f.nome FROM produto as p, fornecedor as f WHERE p.cod = ? and p.cod_fornecedor = f.id;");
            $stmt->bindParam(1, $pesquisa, PDO::PARAM_STR);
            //a variável $stmt, stantment, recebe a query, com a classe PDO recebendo o preparando a execução
            $stmt->execute(); //$stmt executa a query usando de uma função da classe PDO
            //enquanto houver registros irá executar o comando echo, criando uma tabela com os dados recebidos da execução da query
            while ($registro = $stmt->fetch()) {
                $retorno .= "<tr><td>" . $registro["cod"] . "</td><td>" . $registro["marca"] . "</td><td>" . $registro["modelo"] . "</td><td>" .
                        $registro["cor"] . "</td><td>" . $registro["preco"] . "</td><td>" . $registro["nome"] . '</td><td><a href="alterardados.php?cod=' . $registro["cod"]
                        . '">Alterar Dados</a> - <a href="excluir.php?cod=' . $registro["cod"] . '">Excluir</a></td></tr>';
            }
        } else {//se a variável possui letras, a variável que retorna recebe uma mensagem, informando o erro da pesquisa
            $retorno = "Por Favor, digite apenas números para pesquisar por código!";
        }
        return $retorno;
    } elseif ($campo == "fornecedor") {
        $retorno = ""; //variável vasia que irá receber o resultado da pesquisa

        if (is_numeric($pesquisa)) {//aqui o teste é inverso ao anterior, aqui é desejado uma variável tipo string mas que não tenha apenas números
            $retorno = "Pesquisa inválida! Não digite apenas números para pesquisar por um Fornecedor"; //então, se tiver apenas números é retornado a mensagem de erro
        } else {
            $stmt = conectar()->prepare("SELECT p.cod, p.marca, p.modelo, p.cor, p.preco, p.cod_fornecedor, f.nome FROM produto as p, fornecedor as f WHERE f.nome = ? and p.cod_fornecedor = f.id;");
            $stmt->bindParam(1, $pesquisa, PDO::PARAM_STR);
            //a variável $stmt, stantment, recebe a query, com a classe PDO recebendo o preparando a execução
            $stmt->execute(); //$stmt executa a query usando de uma função da classe PDO
            //enquanto houver registros irá executar o comando echo, criando uma tabela com os dados recebidos da execução da query
            while ($registro = $stmt->fetch()) {
                $retorno .= "<tr><td>" . $registro["cod"] . "</td><td>" . $registro["marca"] . "</td><td>" . $registro["modelo"] . "</td><td>" .
                        $registro["cor"] . "</td><td>" . $registro["preco"] . "</td><td>" . $registro["nome"] . '</td><td><a href="alterardados.php?cod=' . $registro["cod"]
                        . '">Alterar Dados</a> - <a href="excluir.php?cod=' . $registro["cod"] . '">Excluir</a></td></tr>';
            }
        }
        return $retorno;
    } elseif ($campo == "preco") {
        $retorno = ""; //variável vasia que irá receber o resultado da pesquisa

        if (is_numeric($pesquisa)) {//aqui é como o primeiro caso, é desejado uma variável string apenas com números
            $stmt = conectar()->prepare("SELECT p.cod, p.marca, p.modelo, p.cor, p.preco, p.cod_fornecedor, f.nome FROM produto as p, fornecedor as f WHERE p.preco = ? and p.cod_fornecedor = f.id;");
            $stmt->bindParam(1, $pesquisa, PDO::PARAM_STR);
            //a variável $stmt, stantment, recebe a query, com a classe PDO recebendo o preparando a execução
            $stmt->execute(); //$stmt executa a query usando de uma função da classe PDO
            //enquanto houver registros irá executar o comando echo, criando uma tabela com os dados recebidos da execução da query
            while ($registro = $stmt->fetch()) {
                $retorno .= "<tr><td>" . $registro["cod"] . "</td><td>" . $registro["marca"] . "</td><td>" . $registro["modelo"] . "</td><td>" .
                        $registro["cor"] . "</td><td>" . $registro["preco"] . "</td><td>" . $registro["nome"] . '</td><td><a href="alterardados.php?cod=' . $registro["cod"]
                        . '">Alterar Dados</a> - <a href="excluir.php?cod=' . $registro["cod"] . '">Excluir</a></td></tr>';
            }
        } else {
            $retorno = "Por Favor, digite apenas números para pesquisar por preço, e verifique se usou o ponto e não a vírgula!"; //então se tiver letras, se não for apenas números
        }//é mostrado a mensagem, como também se usar a vírgula, precisa ser o ponto
        return $retorno;
    }
}

?>