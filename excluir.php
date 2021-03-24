<?php
require_once 'CRUD.php';
$cod = $_GET["cod"];
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <?php
        echo '<title>Deletar o produto ' . pesquisaPorCod($cod)[2] . '</title>';
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
                    <form action="Deletor.php" method="POST">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><input id="inputCod" name="inputCod"> </li>
                            <li class="list-group-item">Marca: <?php echo pesquisaPorCod($cod)[1]; ?></li>
                            <li class="list-group-item">Modelo: <?php echo pesquisaPorCod($cod)[2]; ?></li>
                            <li class="list-group-item">Cor: <?php echo pesquisaPorCod($cod)[3]; ?></li>
                            <li class="list-group-item">Preço: <?php echo pesquisaPorCod($cod)[4]; ?></li>
                            <li class="list-group-item">Data de Fabricação: <?php echo pesquisaPorCod($cod)[5]; ?></li>
                            <li class="list-group-item">Data de Cadastro: <?php echo pesquisaPorCod($cod)[6]; ?></li>
                            <li class="list-group-item">Fornecedor: <?php echo pesquisaPorCod($cod)[7]; ?></li>
                        </ul>


                        <!-- Botão de Deletar -->
                        <div class="form-group">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalConfirmacao">Deletar</button>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="modalConfirmacao" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Confirmar a Exclusão do Registro</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Tem Certeza que quer deletar este Registro?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Manter</button>
                                        <button type="submit" class="btn btn-primary" name="deleta-dados">Deletar</button>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </form>



                    <?php
                    ?>
                </div>
            </div>

        </div>   
        <script>
            document.getElementById('inputCod').value = `<?php echo pesquisaPorCod($cod)[0] ?>`
        </script>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    </body>
</html>
