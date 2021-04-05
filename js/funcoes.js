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

