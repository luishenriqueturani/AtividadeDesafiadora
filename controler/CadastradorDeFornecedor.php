<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
if ((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['usuario']);
    unset($_SESSION['senha']);
    require_once '../view/GUI.php'; //chamado do gui
    $gui = new GUI();//instância do objeto de gui
    echo $gui->gerarInformativo("Atenção", "Seu tempo de seção espirou ou não foi feito Login!");//gera um modal informando a situação
    header("refresh: 3; ../view/Login.php");//após aguardar 3 segundos transfere para a tela de login
}
//termina a verificação de session


require_once '../model/CRUD.php';//requisição do crud
require_once '../model/Fornecedor.php';//requisição do fornecedor
$fornecedor = new Fornecedor();//instância da classe fornecedor
try {
    $fornecedor->setNome(isset($_REQUEST['nome']) ? $_REQUEST['nome'] : null);//o objeto fornecedor chama as funções set para fazer a alteração dos valores das variáveis
    $fornecedor->setEmail(isset($_REQUEST['email']) ? $_REQUEST['email'] : null);//caso o campo não tenha sido preenchido é enviado para o set um valor null
    $fornecedor->setTelefone(isset($_REQUEST['telefone']) ? $_REQUEST['telefone'] : null);
    $fornecedor->setRua(isset($_REQUEST['rua']) ? $_REQUEST['rua'] : null);
    $fornecedor->setNumEndereco(isset($_REQUEST['num']) ? $_REQUEST['num'] : null);
    $fornecedor->setCidade(isset($_REQUEST['cidade']) ? $_REQUEST['cidade'] : null);
    $fornecedor->setEstado(isset($_REQUEST['estado']) ? $_REQUEST['estado'] : null);
    $fornecedor->setCep(isset($_REQUEST['cep']) ? $_REQUEST['cep'] : null);
    
    //se um dos campos for null, mostra uma mensagem para que seja tudo preenchido, senão...
    if (empty($fornecedor->getNome()) || empty($fornecedor->getEmail()) || empty($fornecedor->getTelefone()) || empty($fornecedor->getRua())
            || empty($fornecedor->getNumEndereco()) || empty($fornecedor->getCidade()) || empty($fornecedor->getEstado()) || empty($fornecedor->getCep())) {
        echo 'Por favor, preencha todos os campos!';
    } else {//... É chamado a função de cadastro de dados, recebendo as variáveis via get de parâmetros
        cadastrarFornecedor($fornecedor->getNome(), $fornecedor->getTelefone(), $fornecedor->getEmail(), $fornecedor->getRua(), $fornecedor->getNumEndereco(), $fornecedor->getCidade(), $fornecedor->getEstado(), $fornecedor->getCep());
        $fornecedor->limpar();//chama a função para fazer a limpeza das variáveis
        echo $gui->gerarInformativo("Cadastrado", "Cadastro realizado com sucesso!");//chama função que mostra um modal com as informações passadas por parâmetro
        header("refresh: 3; ../view/cadastrarFornecedor.php");//transfere o usuário para a tela de cadastro de funcionários, onde há a lista dos cadastrados
    }
} catch (Exception $ex) {
    echo $gui->gerarInformativo("Erro! :( ", "$ex");    //a função agora é usada para mostrar o conteúdo do erro
    header("refresh: 3; ../view/index.php");            //após 3 segundos é transferido para a tela inicial
}

