<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
if ((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['usuario']);
    unset($_SESSION['senha']);
    require_once './GUI.php'; //chamado do gui
    $gui = new GUI(); //instância do objeto de gui
    echo $gui->gerarInformativo("Atenção", "Seu tempo de seção espirou ou não foi feito Login!"); //gera um modal informando a situação
    header("refresh: 3; ../view/Login.php"); //após aguardar 3 segundos transfere para a tela de login
}
//termina a verificação de session
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
        <title>Atividade Desafiadora - Cadastrar produtos</title>
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
        </nav><!-- termina a navbar -->

        <div class="container">
            <!-- 
                Começa o formulário, atua nesta mesma página
                Usa o método POST
            -->
            <form action="../controler/CadastradorDeFornecedor.php" method="POST" name="cad-fornecedor">
                <!-- formulário do fronecedor -->

                <h3>Dados do Fornecedor</h3>
                <div class="form-row">
                    <!-- pede o nome -->
                    <div class="form-group col-md-6">
                        <label for="inputNome">Nome<span>*</span></label>
                        <input type="text" class="form-control" id="inputNome" name="nome" placeholder="Nome do fornecedor..." required="" maxlength="100">
                    </div>
                    <!-- pede o e-mail -->
                    <div class="form-group col-md-6">
                        <label for="inputEmail">Email<span>*</span></label>
                        <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email..." required="" maxlength="50">
                    </div>
                    <!-- pede o telefone -->
                    <div class="form-group col-md-6">
                        <label for="inputFone">Telefone<span>*</span></label>
                        <input type="text" class="form-control" id="inputFone" name="telefone" placeholder="Telefone..." required="" maxlength="30">
                    </div>
                </div>
                <!-- termina aqui a primeira parte do formulário -->
                <hr/>
                <!-- esta parte é para a parte do endereço -->
                <h4>Endereco<span>*</span></h4>
                <div class="Form-group">
                    <!-- aqui é pedido que entre com o cep -->
                    <label for="inputCEP">Digite o cep<span>*</span></label>
                    <input type="number" class="form-control" size="50" id="inputCEP" name="cep" placeholder="Digite o cep..." min="0"  max="99999999" required=""/>
                    <small>Digite o cep sem o " - ".</small>
                    <!-- deve-se realizar a pesquisa do cep --> 
                    <button type="button" onclick="consultarCEP()" class="btn btn-primary" id="btnCep">Pesquisar</button>
                    <small>Entre com o CEP para ser pesquisado</small>
                    <fieldset>
                        <label for="rua">Rua</label>
                        <input type="text" id="rua" name="rua" class="form-control" placeholder="Rua..." maxlength="50"> <!-- aqui é devolvido o nome da rua -->
                        <label for="cidade">Cidade</label>
                        <input type="text" id="cidade" name="cidade" class="form-control" placeholder="Cidade..." maxlength="30"> <!-- aqui é devolvido a cidade -->
                        <label for="estado">Estado</label>
                        <input type="text" id="estado" name="estado" class="form-control" placeholder="Estado..." maxlength="30"> <!-- aqui é devolvido a sigla do estado -->
                    </fieldset>

                    <!-- aqui é pedido o número do endereço -->
                    <label for="num">Número<span>*</span></label>
                    <input type="number" class="form-control" size="50" id="num" name="num" placeholder="Número do rua..." min="0" max="99999999999" required=""/>

                </div>
                <hr/>

                <!-- botão para realizar o cadastro -->
                <button type="submit" name="cadastrar" class="btn btn-primary">Cadastrar</button>
                <small>Os campos com " * " são obrigatórios</small>
            </form>
            
        </div>
        <div class="container-fluid"><!-- aqui começa uma nova div global container-fluid, ela é mais larga, dando espaço para uma tabela tão grande como é essa -->
            <h3>Lista de Fornecedores</h3>
            <table class="table">
                <thead>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Rua</th>
                    <th scope="col">Número</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Cep</th>
                    <th scope="col">Ações</th>
                </thead>
                <tbody>
                    <?php 
                    require_once '../model/CRUD.php'; 
                    echo ''. pesquisaFornecedores();
                    //aqui é chamado o crud e a sua função que retorna uma pesquisa dos fornecedores 
                    //cadastrados no bd no formato da tabela 
                    ?>
                </tbody>
            </table>
        </div>
        <script src="../js/funcoes.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    </body>

</html>