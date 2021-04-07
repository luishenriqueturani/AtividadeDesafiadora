<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

        <title>Login Atividade Desafiadora</title>
    </head>
    <body>
        <div class="container">
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
        
    </body>
</html>
