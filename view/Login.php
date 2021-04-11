<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

        <link rel="stylesheet" href="../css/estilos.css" type="text/css">
        <title>Login Atividade Desafiadora</title>
    </head>
    <body>
        <!-- começa a navbar, todos os links dela está com a classe disabled do bootstrap, para impedir que possa sair da tela de login pelos links, medida de segurança apenas
        por ter, por que eu queria que o visual do site se mantivesse em todas as páginas -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link disabled" href="index.php">Cadastrados<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="cadastrarProd.php">Cadastro de Produto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="cadastrarFornecedor.php">Cadastro de Fornecedor</a>
                    </li>
                </ul>
                <ul class="navbar-nav flex-row ml-md-auto d-none d-md-flex">
                    <li class="nav-item dropdown">
                        <a class="nav-item nav-link dropdown-toggle mr-md-2 disabled" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Espaço do Usuário
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item disabled" href="CadUsuario.php">Cadastrar novo Usuário</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item disabled" href="../controler/SairUsuario.php">Sair</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- termina a navbar -->
        <div class="container">
            <h3>Realize o Login para começarmos</h3>
            <div id="form-login">
                <form action="../controler/Validador.php" method="post">
                    <div class="form-group">
                        <label for="usuario">Usuário</label>
                        <input type="text" class="form-control" id="usuario" name="usuario" aria-describedby="emailHelp" placeholder="Entre com o usuário..." required="" maxlength="50">
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite a senha..." required="" maxlength="30">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

    </body>
</html>
