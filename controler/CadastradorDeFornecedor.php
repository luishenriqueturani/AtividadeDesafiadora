<?php
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
        header("Location: ../view/cadastrarFornecedor.php");//transfere o usuário para a tela de cadastro de funcionários, onde há a lista dos cadastrados
    }
} catch (Exception $ex) {//caso dê erro, é feito um alert com a mensagem de erro
    echo '<script>alert(' . $ex . ');</script>';
}

