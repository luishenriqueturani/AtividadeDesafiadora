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

require_once '../model/CRUD.php'; //chama o Objeto CRUD, para ser possível usar suas funções
$cod = $_REQUEST["cod"]; //atribui o cod enviado por get a uma variável, para ser usado na página
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <?php
        echo '<title>Alteração de dados do produto ' . pesquisaPorCod($cod)[2] . '</title>'; //com o echo é criado o title, recebendo um código via get, no CRUD é feito um pesquisa pelo
        ?>                                                                          <!--cod, retornando um array, que na posição 2 vem o nome do produto, sendo posto no title da página
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">


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
        </nav>
        <!-- termina a navbar -->
        <div class="container">
            <h3>Dados do Produto</h3>
            <div class="row">
                <div class="col-lg">
                    
                    <form name="alterarVariosDados" action="../controler/Alterador.php" method="POST">
                        <input type="hidden" name="cod" value="<?php echo "$cod"; ?>">
                        <div class="form-group">
                            <label for="marca">Marca: <?php echo pesquisaPorCod($cod)[1]; ?></label>
                            <input type="text" class="form-control" id="marca" name="inputMarca" placeholder="Digite a nova marca..." maxlength="30">
                        </div>
                        <!-- Form do Modelo -->
                        <div class="form-group">
                            <label for="modelo"> Modelo: <?php echo pesquisaPorCod($cod)[2]; ?></label>
                            <input type="text" class="form-control" id="modelo" name="inputModelo" placeholder="Digite o novo modelo..." maxlength="30">
                        </div>
                        <!-- Form da cor -->
                        <div class="form-group">
                            <label for="cor">Cor: <?php echo pesquisaPorCod($cod)[3]; ?></label>
                            <input type="text" class="form-control" id="cor" name="inputCor" placeholder="Digite a nova cor..." maxlength="20">
                        </div>
                        <!-- Form do preço -->
                        <div class="form-group">
                            <label for="preco">Preço: R$ <?php echo pesquisaPorCod($cod)[4]; ?></label>
                            <input type="number" class="form-control" id="preco" name="inputPreco" placeholder="Digite o novo preço..." min="0" max="999999999999">
                        </div>
                        <!-- Form da data de fabricação -->
                        <div class="form-group">
                            <label for="data-fab">Data de fabricação: <?php echo pesquisaPorCod($cod)[5]; ?></label>
                            <input type="date" class="form-control" id="data-fab" name="input-data-fab">
                        </div>
                        <!-- Form de Cadastro -->
                        <div class="form-group">
                            <label for="data-cad">Data de Cadastro: <?php echo pesquisaPorCod($cod)[6]; ?></label>
                            <input type="date" class="form-control" id="data-cad" name="input-data-cad">
                        </div>
                        <!-- Form do fornecedor-->
                        <div class="form-group">
                            <?php
                            echo '<label for="select-fornecedor">Fornecedor: ' . pesquisaPorCod($cod)[7] . '</label>';                  //cria um select para escolher o fornecedor, escolhi fazer isso por php para que o tempo de carregamento seja o mesmo do conteúdo
                            echo '<select class="form-control" id="select-fornecedor"  name="select-fornecedor" required=""><option>Escolha o fornecedor</option>';
                            try {
                                echo selecionaFornecedor();//chama uma função que cria os options pesquisando os fornecedores no bd
                            } catch (Exception $ex) {
                                echo "<script>alert($ex);</script>";
                            }
                            echo '</select>';
                            ?>
                        </div>
                        <button type="submit" name="alterar" class="btn btn-primary">Alterar</button><!-- botão para chamar a função de alterar dados -->
                    </form>



                </div>
            </div>

        </div>    
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    </body>
</html>
