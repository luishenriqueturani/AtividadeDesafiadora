<?php

class GUI {

    function gerarInformativo($titulo, $conteudo) {
//esta é uma function que recebe dois valores por parâmetro, a variável retorno recebe como valor uma página html apenas com um modal do bootstrap e os scripts minimos do jquery, 
//que é o necessário para lançar um modal
        $retorno = '<!DOCTYPE html><html><head><meta charset="UTF-8">';
        $retorno .= '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" '
                . 'integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">';
        $retorno .= '<title></title></head><body>';
        //aqui começa a receber o modal
        $retorno .= '<div class="modal fade" id="modalInformativo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">';
        $retorno .= '<div class="modal-dialog" role="document">';
        $retorno .= '<div class="modal-content">';
        $retorno .= '<div class="modal-header">';
        $retorno .= '<h5 class="modal-title" id="exampleModalLabel">'.$titulo.'</h5>';//aqui vem o título do modal, onde entra a variável titulo
        $retorno .= '</div><div class="modal-body">'.$conteudo.'</div></div></div></div>';//aqui vem o conteúdo do modal pela variável conteudo, aqui também fecha o modal
        $retorno .= '<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" '
                . 'integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>';
        $retorno .= '<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" '
                . 'integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>';
        $retorno .= '<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" '
                . 'integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>';
        $retorno .= '<script type="text/javascript">$(document).ready(function () {';//aqui começa um script de js que lança o modal
        $retorno .= "    $('#modalInformativo').modal('show')";
        $retorno .= '})</script></body></html>';//aqui termina fechando tudo
        
        return $retorno;
    }

}
?>
