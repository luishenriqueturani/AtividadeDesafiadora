<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
require_once './GUI.php'; //chamado do gui
$gui = new GUI(); //instância do objeto de gui
if ((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['usuario']);
    unset($_SESSION['senha']);
    echo $gui->gerarInformativo("Atenção", "Seu tempo de seção espirou ou não foi feito Login!"); //gera um modal informando a situação
    header("refresh: 3; ../view/Login.php"); //após aguardar 3 segundos transfere para a tela de login
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

        <link rel="stylesheet" href="../css/estilos.css" type="text/css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Atividade Desafiadora - site que manipula estoque</title>
    </head>

    <body>
        <!-- começa a navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Cadastrados<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cadastrarProd.php">Cadastro de Produto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cadastrarFornecedor.php">Cadastro de Fornecedor</a>
                    </li>
                </ul>
                <ul class="navbar-nav flex-row ml-md-auto d-none d-md-flex">
                    <li class="nav-item dropdown">
                        <a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Espaço do Usuário
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="CadUsuario.php">Cadastrar novo Usuário</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../controler/SairUsuario.php">Sair</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- termina a navbar -->
        <div class="container">

            <h3>Lista de Produtos</h3>
            <form action="index.php" method="POST">
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" id="InputPesquisa" name="inputPesquisa" placeholder="Digite para realizar a pesqisa...">
                    </div>
                    <div class="col">
                        <select id="selectTipoPesquisa" name="selectTipoPesquisa" class="form-control">
                            <option selected="" value="cod">Código</option>
                            <option value="fornecedor">Fornecedor</option>
                            <option value="preco">Preço</option>
                        </select>
                    </div>
                    <div class="col">
                        <button class="btn btn-primary" type="submit" id="btnPesquisar" name="btnPesquisar">Pesquisar</button>
                    </div>
                </div>
            </form>
            <small class="info-pesquisa">Escolha o tipo de pesquisa antes de pesquisar.</small>
            <table class="table">  <!-- A tabela é para mostrar os registros -->
                <thead>
                    <tr>
                        <th scope="col">Código</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Modelo</th>
                        <th scope="col">Cor</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Fornecedor</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once '../model/CRUD.php'; //chamada do CRUD


                    if (isset($_POST["btnPesquisar"])) { //se o botão foi precionado é executado o código, senão....
                        $pesquisa = isset($_POST["inputPesquisa"]) ? $_POST["inputPesquisa"] : null; //se foi digitado algo o valor é atribuido a variável, senão ela fica nula
                        $campo = $_POST["selectTipoPesquisa"]; //como o usuário não precisa digitar nada, e o valor é controlado pelo select, apenas é adicionado o valor a variável
                        if ($pesquisa == null) {//se o valor a ser pesquisado for nulo é mostrado uma mensagem ao usuário, senão...
                            echo "Por favor, digite o que deseja pesquisar!";
                        } else {
                            echo "" . pesquisarCampos($pesquisa, $campo); //é chamado uma função tendo os parâmetros passados
                        }
                    } else {
                        try {//try catch para tratar um pocível erro
                            echo "" . buscarRegistrosTabela(); //chama a função para imprimir uma tabela, 
                        } catch (Exception $ex) {
                            echo $gui->gerarInformativo("ERRO! :(", "$ex"); //caso dê erro, mostra um modal com o  erro
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    </body>

</html>