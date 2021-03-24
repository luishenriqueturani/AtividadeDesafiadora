<?php
require_once 'CRUD.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <?php
        echo '<title>Deletar o produto ' . pesquisaPorCod($_GET["cod"])[2] . '</title>';
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
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Marca: <?php echo pesquisaPorCod($_GET["cod"])[1]; ?></li>
                        <li class="list-group-item">Modelo: <?php echo pesquisaPorCod($_GET["cod"])[2]; ?></li>
                        <li class="list-group-item">Cor: <?php echo pesquisaPorCod($_GET["cod"])[3]; ?></li>
                        <li class="list-group-item">Preço: <?php echo pesquisaPorCod($_GET["cod"])[4]; ?></li>
                        <li class="list-group-item">Data de Fabricação: <?php echo pesquisaPorCod($_GET["cod"])[5]; ?></li>
                        <li class="list-group-item">Data de Cadastro: <?php echo pesquisaPorCod($_GET["cod"])[6]; ?></li>
                        <li class="list-group-item">Fornecedor: <?php echo pesquisaPorCod($_GET["cod"])[7]; ?></li>
                    </ul>
                    <!-- Botão de Deletar -->
                    <form action="excluir.php" method="POST">
                        <div class="form-group">
                            <button type="submit" name="deleta-dados" class="btn btn-primary">Deletar</button>
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
