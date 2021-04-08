<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
if ((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['usuario']);
    unset($_SESSION['senha']);
    //echo 'Ele invalidou usuário e senha';
    //echo $_SESSION['usuario'] . '<br>' . $_SESSION['senha'];
    header("Location: Login.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Atividade Desafiadora - Cadastrar produtos</title>
    </head>

    <body>
        <!-- Começa a navbar -->
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
            </div>
        </nav><!-- termina a navbar -->

        <div class="container">
            <!-- 
                Começa o formulário, atua nesta mesma página
                Usa o método POST para maior segurança
            -->
            <form action="../controler/CadastradorDeProdutos.php" method="POST">
                <!-- Pede os dados do protuto -->

                <h3>Dados do Produto</h3>
                <div class="form-row">
                    <!-- Input do código -->
                    <div class="form-group col-md-6">
                        <label for="inputCod">Código<span>*</span></label>
                        <input type="number" class="form-control" id="inputCod" name="inputCod" placeholder="Código do produto..." required="" min="0" max="99999999999">
                    </div>
                    <!-- Input da marca -->
                    <div class="form-group col-md-6">
                        <label for="inputMarca">Marca<span>*</span></label>
                        <input type="text" class="form-control" id="inputMarca" name="inputMarca" placeholder="Marca..." required="" maxlength="30">
                    </div>
                    <!-- Input do modelo -->
                    <div class="form-group col-md-6">
                        <label for="inputModelo">Modelo<span>*</span></label>
                        <input type="text" class="form-control" id="inputModelo" name="inputModelo" placeholder="Modelo..." required="" maxlength="30">
                    </div>
                    <!-- Input da cor -->
                    <div class="form-group col-md-6">
                        <label for="inputCor">Cor<span>*</span></label>
                        <input type="text" class="form-control" id="inputCor" name="inputCor" placeholder="Cor..." required="" maxlength="20">
                    </div>
                    <!-- Input do preço -->
                    <div class="form-group col-md-6">
                        <label for="inputPreco">Preço<span>*</span></label>
                        <input type="number" class="form-control" id="inputPreco" name="inputPreco" placeholder="Preco..." required="" min="0" max="999999999999">
                    </div>
                    <!-- input da data de fabricação -->
                    <div class="form-group col-md-6">
                        <label for="inputData">Data de Fabricação<span>*</span></label>
                        <input type="date" class="form-control" id="inputData" name="inputData" required="">
                    </div>

                    <?php
                    echo '<label for="select-fornecedor">Fornecedor*</label>';                  //cria um select para escolher o fornecedor, escolhi fazer isso por php para que o tempo de carregamento seja o mesmo do conteúdo
                    echo '<select class="form-control" id="select-fornecedor"  name="select-fornecedor" required=""><option>Escolha o fornecedor</option>';
                    try {
                        require_once '../model/CRUD.php';//instancia o método crud
                        echo selecionaFornecedor();//é chamado um método do CRUD, criando a seleção dos fornecedores
                    } catch (PDOException $ex) {//caso de erro mostra um alert
                        echo "<script>alert($ex);</script>";
                    }
                    echo '</select>';
                    
                    ?>
                </div>

                <br>
                <button type="submit" name="cadastrarProdutos" class="btn btn-primary">Cadastrar</button> <!-- botão de cadastro -->
                <small>Os campos com " * " são obrigatórios</small>
                <small>A data atual é pega do sistema.</small>
            </form>
            
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    </body>

</html>