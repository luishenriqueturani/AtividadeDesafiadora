<?php
require_once 'CRUD.php';
//pesquisaPorCod($cod);
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <?php
        echo '<title>Alteração de dados do produto ' . pesquisaPorCod($_GET["cod"])[2] . '</title>';
        ?>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">


    </head>
    <body>
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
        <div class="container">
            <h3>Dados do Produto</h3>
            <div class="row">
                <div class="col-lg">
                    <!-- Form da marca -->
                    <form action="alterardados.php" method="POST">
                        <div class="form-group">
                            <label for="marca"><?php echo pesquisaPorCod($_GET["cod"])[1]; ?></label>
                            <input type="text" class="form-control" id="marca" name="input-marca" placeholder="Digite a nova marca...">
                            <button type="submit" name="alterar-marca" class="btn btn-primary">Alterar</button>
                        </div>
                    </form>
                    <!-- Form do Modelo -->
                    <form action="alterardados.php" method="POST">
                        <div class="form-group">
                            <label for="modelo"><?php echo pesquisaPorCod($_GET["cod"])[2]; ?></label>
                            <input type="text" class="form-control" id="modelo" name="input-modelo" placeholder="Digite o novo modelo...">
                            <button type="submit" name="altera-modelo" class="btn btn-primary">Alterar</button>
                        </div>
                    </form>
                    <!-- Form da cor -->
                    <form action="alterardados.php" method="POST">
                        <div class="form-group">
                            <label for="cor"><?php echo pesquisaPorCod($_GET["cod"])[3]; ?></label>
                            <input type="text" class="form-control" id="cor" name="input-cor" placeholder="Digite a nova cor...">
                            <button type="submit" name="altera-cor" class="btn btn-primary">Alterar</button>
                        </div>
                    </form>
                    <!-- Form do preço -->
                    <form action="alterardados.php" method="POST">
                        <div class="form-group">
                            <label for="preco">R$ <?php echo pesquisaPorCod($_GET["cod"])[4]; ?></label>
                            <input type="number" class="form-control" id="preco" name="input-preco" placeholder="Digite o novo preço..." min="0" max="999999">
                            <button type="submit" name="altera-preco" class="btn btn-primary">Alterar</button>
                        </div>
                    </form>
                    <!-- Form da data de fabricação -->
                    <form action="alterardados.php" method="POST">
                        <div class="form-group">
                            <label for="data-fab">Data de fabricação: <?php echo pesquisaPorCod($_GET["cod"])[5]; ?></label>
                            <input type="date" class="form-control" id="data-fab" name="input-data-fab">
                            <button type="submit" name="altera-data-fab" class="btn btn-primary">Alterar</button>
                        </div>
                    </form>
                    <!-- Form de Cadastro -->
                    <form action="alterardados.php" method="POST">
                        <div class="form-group">
                            <label for="data-cad">Data de Cadastro: <?php echo pesquisaPorCod($_GET["cod"])[6]; ?></label>
                            <input type="date" class="form-control" id="data-cad" name="input-data-cad">
                            <button type="submit" name="altera-data-cad" class="btn btn-primary">Alterar</button>
                        </div>
                    </form>
                    <!-- Form do fornecedor-->
                    <form action="alterardados.php" method="POST">
                        <div class="form-group">
                            <?php
                            echo '<label for="select-fornecedor">Fornecedor: '.pesquisaPorCod($_GET["cod"])[7].'</label>';                  //cria um select para escolher o fornecedor, escolhi fazer isso por php para que o tempo de carregamento seja o mesmo do conteúdo
                            echo '<select class="form-control" id="select-fornecedor"  name="select-fornecedor" required=""><option>Escolha o fornecedor</option>';
                            try {
                                require_once 'CRUD.php';
                                echo selecionaFornecedor();
                            } catch (Exception $ex) {
                                echo "<script>alert($ex);</script>";
                            }
                            echo '</select>';
                            ?>
                            <button type="submit" name="altera-fornecedor" class="btn btn-primary">Alterar</button>
                        </div>
                    </form>



                    <?php
                    ?>
                </div>
            </div>

        </div>    
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    </body>
</html>
