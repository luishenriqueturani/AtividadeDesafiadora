<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

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
            </div>
        </nav>
        <!-- termina a navbar -->
        <div class="container">

            <h3>Lista de Produtos</h3>
            <form action="index.php" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-08">
                        <input type="text" class="form-control" id="InputPesquisa" name="inputPesquisa" placeholder="Digite para realizar a pesqisa...">
                    </div>
                    <div class="form-group col-md-04">
                        <select id="selectTipoPesquisa" name="selectTipoPesquisa" class="form-control">
                            <option selected="" value="cod">Código</option>
                            <option value="fornecedor">Fornecedor</option>
                            <option value="preco">Preço</option>
                        </select>
                    </div>
                    <div class="form-group col-md-02">
                        <button class="btn btn-primary" type="submit" id="btnPesquisar" name="btnPesquisar">Pesquisar</button>
                    </div>
                </div>
                <small>Escolha o tipo de pesquisa antes de pesquisar.</small>
            </form>
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
                    require_once 'CRUD.php'; //instancia o CRUD




                    if (isset($_POST["btnPesquisar"])) {
                        $pesquisa = isset($_POST["inputPesquisa"]) ? $_POST["inputPesquisa"] : null;
                        $campo = $_POST["selectTipoPesquisa"];
                        if ($pesquisa == null) {
                            echo "Por favor, digite o que deseja pesquisar!";
                        } else {
                            echo "" . pesquisarCampos($pesquisa, $campo);
                        }
                    } else {
                        try {//try catch para tratar um pocível erro
                            echo "" . buscarRegistrosTabela(); //chama a função para imprimir uma tabela, 
                        } catch (Exception $ex) {
                            echo '<script>alert(' . $ex . ');</script>'; //caso dê erro, mostra um alert com o  erro
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