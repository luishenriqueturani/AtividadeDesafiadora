<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
require_once '../view/GUI.php'; //chamado do gui
$gui = new GUI(); //instância do objeto de gui
if ((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['usuario']);
    unset($_SESSION['senha']);
    echo $gui->gerarInformativo("Atenção", "Seu tempo de seção espirou ou não foi feito Login!"); //gera um modal informando a situação
    header("refresh: 3; ../view/Login.php"); //após aguardar 3 segundos transfere para a tela de login
}
//termina a verificação de session

require_once '../model/CRUD.php'; //requisição de uso do crud
require_once '../model/Produto.php'; //requisição de uso do produto
$prod = new Produtos(); //instância de produtos
try {//tratamento de erro
    $prod->setCod(isset($_REQUEST['inputCod']) ? $_REQUEST['inputCod'] : null); //o objeto chama o método set levando por parâmetro o post com o dado passado pelo usuário, se não foi nada preenchido
    $prod->setMarca(isset($_REQUEST['inputMarca']) ? $_REQUEST['inputMarca'] : null); //é passado o valor null
    $prod->setModelo(isset($_REQUEST['inputModelo']) ? $_REQUEST['inputModelo'] : null);
    $prod->setCor(isset($_REQUEST['inputCor']) ? $_REQUEST['inputCor'] : null);
    $prod->setPreco(isset($_REQUEST['inputPreco']) ? $_REQUEST['inputPreco'] : null);
    $prod->setCodFornecedor(isset($_REQUEST['select-fornecedor']) ? $_REQUEST['select-fornecedor'] : null);
    $prod->setDataFabricacao(isset($_REQUEST['inputData']) ? $_REQUEST['inputData'] : null);
    $prod->setDataCadastro(date("y-m-d"));

    if (empty($prod->getCod()) || empty($prod->getMarca()) || empty($prod->getModelo()) || empty($prod->getCor()) || empty($prod->getPreco()) || empty($prod->getDataFabricacao()) || empty($prod->getCodFornecedor())) {
        echo "Por favos, preencha todos os campos!"; //se algum dos campos estiver como null, mostra mensagem para que seja tudo preenchido
    } else {//se tudo estiver ok, chama função para cadastrar, passando por parâmetro as variáveis via get
        cadastrarProduto($prod->getCod(), $prod->getMarca(), $prod->getModelo(), $prod->getCor(), $prod->getPreco(), $prod->getCodFornecedor(), $prod->getDataFabricacao(), $prod->getDataCadastro());
        $prod->limpar(); //chama a function para limpar as variáveis
        echo $gui->gerarInformativo("Cadastrado", "O produto foi cadastrado com Sucesso!"); //chama função que mostra um modal com as informações passadas por parâmetro
        header("refresh: 3; ../view/index.php"); //manda o usuário para a tela inicial
    }
} catch (PDOException $ex) {
    echo $gui->gerarInformativo("Erro! :( ", "$ex");    //a função agora é usada para mostrar o conteúdo do erro
    //header("refresh: 3; ../view/index.php");            //após 3 segundos é transferido para a tela inicial
}


