<?php
require_once 'CRUD.php'; //chama o Objeto CRUD, para ser possível usar suas funções
$id = $_REQUEST["id"]; //atribui o cod enviado por get a uma variável, para ser usado na página
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <?php
        echo '<title>Alteração de dados do Fornecedor ' . retornaValoresFornecedor($id)[1] . '</title>'; //com o echo é criado o title, recebendo um código via get, no CRUD é feito um pesquisa pelo
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
            <h3>Dados do Fornecedor</h3>
            <div class="row">
                <div class="col-lg">

                    <form name="alterarDados" action="AlteradorFornecedor.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo "$id"; ?>">
                        <div class="form-group">
                            <label for="Nome">Nome: <?php echo retornaValoresFornecedor($id)[1]; ?></label>
                            <input type="text" class="form-control" id="Nome" name="inputNome" placeholder="Digite o novo nome do Fornecedor...">
                        </div>
                        <div class="form-group">
                            <label for="telefone">Telefone: <?php echo retornaValoresFornecedor($id)[2]; ?></label>
                            <input type="text" class="form-control" id="telefone" name="inputTelefone" placeholder="Digite o novo Telefone...">
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail: <?php echo retornaValoresFornecedor($id)[3]; ?></label>
                            <input type="text" class="form-control" id="email" name="inputEmail" placeholder="Digite o novo E-mail...">
                        </div>
                        <!-- esta parte é para a parte do endereço -->
                        <h5>Endereco</h5>
                        <div class="Form-group">
                            <!-- aqui é pedido que entre com o cep -->
                            <label for="inputCEP">Cep: <?php echo retornaValoresFornecedor($id)[8]; ?></label>
                            <input type="number" class="form-control" size="50" id="inputCEP" name="cep" placeholder="Digite o cep..." min="0"/>
                            <small>Digite o cep sem o " - ".</small>
                            <!-- deve-se realizar a pesquisa do cep --> 
                            <button type="button" onclick="consultarCEP()" class="btn btn-primary" id="btnCep">Pesquisar</button>
                            <small>Entre com o CEP para ser pesquisado</small>
                            <fieldset>
                                <label for="rua">Rua: <?php echo retornaValoresFornecedor($id)[4]; ?></label>
                                <input type="text" id="rua" name="rua" class="form-control" placeholder="Rua..."> <!-- aqui é devolvido o nome da rua -->
                                <label for="cidade">Cidade: <?php echo retornaValoresFornecedor($id)[6]; ?></label>
                                <input type="text" id="cidade" name="cidade" class="form-control" placeholder="Cidade..."> <!-- aqui é devolvido a cidade -->
                                <label for="estado">Estado: <?php echo retornaValoresFornecedor($id)[7]; ?></label>
                                <input type="text" id="estado" name="estado" class="form-control" placeholder="Estado..."> <!-- aqui é devolvido a sigla do estado -->
                            </fieldset>

                            <!-- aqui é pedido o número do endereço -->
                            <label for="num">Número: <?php echo retornaValoresFornecedor($id)[5]; ?></label>
                            <input type="number" class="form-control" size="50" id="num" name="num" placeholder="Número do rua..." min="0"/>

                        </div>
                        

                        <button type="submit" name="alterar" class="btn btn-primary">Alterar</button><!-- botão para chamar a função de alterar dados -->
                    </form>



                </div>
            </div>

        </div> 
        <script>
            function consultarCEP() {
                var cep = $("#inputCEP").val(); //a variável cep recebe o valor do cep digitado
                var url = "http://viacep.com.br/ws/" + cep + "/json/"; //a variável url recebe um endereço do site de pesquisa de cep, no espaço
                //onde entra o cep, o valor da variável cep inserido
                $.getJSON(url, function (result) {      //usando o jquery, é usado uma function para manipular json, entrando com a url e recebendo o json em uma function...
                    console.log(result);                //o resultado em json tem seu retorno no console
                    if (result.erro) {                  //caso o resultado de erro, cep inválido
                        alert("CEP inválido!");         //solta um alerta de cep inválido
                    } else {                            //senão...
                        document.getElementById('rua').value = result.logradouro;       //o imput rua recebe o valor de logradouro
                        document.getElementById('cidade').value = result.localidade;    //o imput cidade recebe o valor de localidade
                        document.getElementById('estado').value = result.uf;            //o imput estado recebe o valor de uf
                    }                                                                   //eu sei que é estranho usar comandos mesclando jquery e js "puro", mas na pressa vai o que está na ponta da lingua
                }).fail(function () {                   //caso dê erro, retorna um alert informando o erro
                    alert('Falha ao consultar o CEP!');
                });
            }
        </script>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    </body>
</html>
