<?php

require_once 'CRUD.php';
$cod = $_REQUEST["cod"];
try {
    $query = 'UPDATE produto SET ';//uma variável que inicia com parte do comando da query

    $marca = isset($_REQUEST['inputMarca']) ? $_REQUEST['inputMarca'] : null;                       //aqui, via POST vem os valores dos campos de imput
    $modelo = isset($_REQUEST['inputModelo']) ? $_REQUEST['inputModelo'] : null;                    //caso algum deles não tenha sido preenchido é dado o valor de null
    $cor = isset($_REQUEST['inputCor']) ? $_REQUEST['inputCor'] : null;
    $preco = isset($_REQUEST['inputPreco']) ? $_REQUEST['inputPreco'] : null;
    $dataFab = isset($_REQUEST['input-data-fab']) ? $_REQUEST['input-data-fab'] : null;
    $dataCad = isset($_REQUEST['input-data-cad']) ? $_REQUEST['input-data-cad'] : null;
    $fornecedor = isset($_REQUEST['select-fornecedor']) ? $_REQUEST['select-fornecedor'] : null;    //este campo dificilmente será null, ele pode ter o valor da comparação do if
    if($fornecedor == "Escolha o fornecedor"){                                                      //assim há esta comparação, para o caso de ter este valor
        $fornecedor = null;                                                                         //ser atribuido o valor de null, impedindo um grande bug
    }

    if ($marca != null) {                                                               //aqui vem o trabalho de uma tarde inteira, os ifelse fazem uma série de comparações
        $query .= 'marca = "' . $marca . '"';                                           //para ver se os campos, e determinados campos, foram preenchidos
        if ($modelo != null) {                                                          //fazendo então concatenações da query, para no final entregar uma query toda pronta, 
            $query .= ', modelo = "' . $modelo . '"';                                   //cuidando das vírgulas inclusive. Tudo isso para usar um único botão para o formulário
            if ($cor != null) {                                                         //mas o incrível é que funcionou com menos testes do que usando um botão para campo
                $query .= ', cor = "' . $cor . '"';
                if ($preco != null) {
                    $query .= ', preco = ' . $preco;
                    if ($dataFab != null) {
                        $query .= ', data_fabricacao = "' . $dataFab . '"';
                        if ($dataCad != null) {
                            $query .= ', data_cadastro = "' . $dataCad . '"';
                            if ($fornecedor != null) {
                                $query .= ', cod_fornecedor = ' . $fornecedor;
                            }
                        } elseif ($fornecedor != null) {
                            $query .= ', cod_fornecedor = ' . $fornecedor;
                        }
                    } elseif ($dataCad != null) {
                        $query .= ', data_cadastro = "' . $dataCad . '"';
                        if ($fornecedor != null) {
                            $query .= ', cod_fornecedor = ' . $fornecedor;
                        }
                    }
                } elseif ($dataFab != null) {
                    $query .= ', data_fabricacao = "' . $dataFab . '"';
                    if ($dataCad != null) {
                        $query .= ', data_cadastro = "' . $dataCad . '"';
                        if ($fornecedor != null) {
                            $query .= ', cod_fornecedor = ' . $fornecedor;
                        }
                    } elseif ($fornecedor != null) {
                        $query .= ', cod_fornecedor = ' . $fornecedor;
                    }
                } elseif ($dataCad != null) {
                    $query .= ', data_cadastro = "' . $dataCad . '"';
                    if ($fornecedor != null) {
                        $query .= ', cod_fornecedor = ' . $fornecedor;
                    }
                } elseif ($fornecedor != null) {
                    $query .= ', cod_fornecedor = ' . $fornecedor;
                }
            }
        } elseif ($cor != null) {
            $query .= ', cor = "' . $cor . '"';
            if ($preco != null) {
                $query .= ', preco = ' . $preco;
                if ($dataFab != null) {
                    $query .= ', data_fabricacao = "' . $dataFab . '"';
                    if ($dataCad != null) {
                        $query .= ', data_cadastro = "' . $dataCad . '"';
                        if ($fornecedor != null) {
                            $query .= ', cod_fornecedor = ' . $fornecedor;
                        }
                    } elseif ($fornecedor != null) {
                        $query .= ', cod_fornecedor = ' . $fornecedor;
                    }
                } elseif ($dataCad != null) {
                    $query .= ', data_cadastro = "' . $dataCad . '"';
                    if ($fornecedor != null) {
                        $query .= ', cod_fornecedor = ' . $fornecedor;
                    }
                }
            } elseif ($dataFab != null) {
                $query .= ', data_fabricacao = "' . $dataFab . '"';
                if ($dataCad != null) {
                    $query .= ', data_cadastro = "' . $dataCad . '"';
                    if ($fornecedor != null) {
                        $query .= ', cod_fornecedor = ' . $fornecedor;
                    }
                } elseif ($fornecedor != null) {
                    $query .= ', cod_fornecedor = ' . $fornecedor;
                }
            } elseif ($dataCad != null) {
                $query .= ', data_cadastro = "' . $dataCad . '"';
                if ($fornecedor != null) {
                    $query .= ', cod_fornecedor = ' . $fornecedor;
                }
            } elseif ($fornecedor != null) {
                $query .= ', cod_fornecedor = ' . $fornecedor;
            }
        } elseif ($preco != null) {
            $query .= ', preco = ' . $preco;
            if ($dataFab != null) {
                $query .= ', data_fabricacao = "' . $dataFab . '"';
                if ($dataCad != null) {
                    $query .= ', data_cadastro = "' . $dataCad . '"';
                    if ($fornecedor != null) {
                        $query .= ', cod_fornecedor = ' . $fornecedor;
                    }
                } elseif ($fornecedor != null) {
                    $query .= ', cod_fornecedor = ' . $fornecedor;
                }
            } elseif ($dataCad != null) {
                $query .= ', data_cadastro = "' . $dataCad . '"';
                if ($fornecedor != null) {
                    $query .= ', cod_fornecedor = ' . $fornecedor;
                }
            }
        } elseif ($dataFab != null) {
            $query .= ', data_fabricacao = "' . $dataFab . '"';
            if ($dataCad != null) {
                $query .= ', data_cadastro = "' . $dataCad . '"';
                if ($fornecedor != null) {
                    $query .= ', cod_fornecedor = ' . $fornecedor;
                }
            } elseif ($fornecedor != null) {
                $query .= ', cod_fornecedor = ' . $fornecedor;
            }
        } elseif ($dataCad != null) {
            $query .= ', data_cadastro = "' . $dataCad . '"';
            if ($fornecedor != null) {
                $query .= ', cod_fornecedor = ' . $fornecedor;
            }
        } elseif ($fornecedor != null) {
            $query .= ', cod_fornecedor = ' . $fornecedor;
        }
    } elseif ($modelo != null) {
        $query .= 'modelo = "' . $modelo . '"';
        if ($cor != null) {
            $query .= ', cor = "' . $cor . '"';
            if ($preco != null) {
                $query .= ', preco = ' . $preco;
                if ($dataFab != null) {
                    $query .= ', data_fabricacao = "' . $dataFab . '"';
                    if ($dataCad != null) {
                        $query .= ', data_cadastro = "' . $dataCad . '"';
                        if ($fornecedor != null) {
                            $query .= ', cod_fornecedor = ' . $fornecedor;
                        }
                    } elseif ($fornecedor != null) {
                        $query .= ', cod_fornecedor = ' . $fornecedor;
                    }
                } elseif ($dataCad != null) {
                    $query .= ', data_cadastro = "' . $dataCad . '"';
                    if ($fornecedor != null) {
                        $query .= ', cod_fornecedor = ' . $fornecedor;
                    }
                } elseif ($fornecedor != null) {
                    $query .= ', cod_fornecedor = ' . $fornecedor;
                }
            } elseif ($dataFab != null) {
                $query .= ', data_fabricacao = "' . $dataFab . '"';
                if ($dataCad != null) {
                    $query .= ', data_cadastro = "' . $dataCad . '"';
                    if ($fornecedor != null) {
                        $query .= ', cod_fornecedor = ' . $fornecedor;
                    }
                } elseif ($fornecedor != null) {
                    $query .= ', cod_fornecedor = ' . $fornecedor;
                }
            } elseif ($dataCad != null) {
                $query .= ', data_cadastro = "' . $dataCad . '"';
                if ($fornecedor != null) {
                    $query .= ', cod_fornecedor = ' . $fornecedor;
                }
            } elseif ($fornecedor != null) {
                $query .= ', cod_fornecedor = ' . $fornecedor;
            }
        } elseif ($preco != null) {
            $query .= ', preco = ' . $preco;
            if ($dataFab != null) {
                $query .= ', data_fabricacao = "' . $dataFab . '"';
                if ($dataCad != null) {
                    $query .= ', data_cadastro = "' . $dataCad . '"';
                    if ($fornecedor != null) {
                        $query .= ', cod_fornecedor = ' . $fornecedor;
                    }
                } elseif ($fornecedor != null) {
                    $query .= ', cod_fornecedor = ' . $fornecedor;
                }
            } elseif ($dataCad != null) {
                $query .= ', data_cadastro = "' . $dataCad . '"';
                if ($fornecedor != null) {
                    $query .= ', cod_fornecedor = ' . $fornecedor;
                }
            } elseif ($fornecedor != null) {
                $query .= ', cod_fornecedor = ' . $fornecedor;
            }
        }
    } elseif ($cor != null) {
        $query .= 'cor = "' . $cor . '"';
        if ($preco != null) {
            $query .= ', preco = ' . $preco;
            if ($dataFab != null) {
                $query .= ', data_fabricacao = "' . $dataFab . '"';
                if ($dataCad != null) {
                    $query .= ', data_cadastro = "' . $dataCad . '"';
                    if ($fornecedor != null) {
                        $query .= ', cod_fornecedor = ' . $fornecedor;
                    }
                } elseif ($fornecedor != null) {
                    $query .= ', cod_fornecedor = ' . $fornecedor;
                }
            } elseif ($dataCad != null) {
                $query .= ', data_cadastro = "' . $dataCad . '"';
                if ($fornecedor != null) {
                    $query .= ', cod_fornecedor = ' . $fornecedor;
                }
            } elseif ($fornecedor != null) {
                $query .= ', cod_fornecedor = ' . $fornecedor;
            }
        } elseif ($dataFab != null) {

            $query .= ', data_fabricacao = "' . $dataFab . '"';
            if ($dataCad != null) {
                $query .= ', data_cadastro = "' . $dataCad . '"';
                if ($fornecedor != null) {
                    $query .= ', cod_fornecedor = ' . $fornecedor;
                }
            } elseif ($fornecedor != null) {
                $query .= ', cod_fornecedor = ' . $fornecedor;
            }
        } elseif ($dataCad != null) {
            $query .= ', data_cadastro = "' . $dataCad . '"';
            if ($fornecedor != null) {
                $query .= ', cod_fornecedor = ' . $fornecedor;
            }
        } elseif ($fornecedor != null) {
            $query .= ', cod_fornecedor = ' . $fornecedor;
        }
    } elseif ($preco != null) {
        $query .= 'preco = ' . $preco;
        if ($dataFab != null) {
            $query .= ', data_fabricacao = "' . $dataFab . '"';
            if ($dataCad != null) {
                $query .= ', data_cadastro = "' . $dataCad . '"';
                if ($fornecedor != null) {
                    $query .= ', cod_fornecedor = ' . $fornecedor;
                }
            } elseif ($fornecedor != null) {
                $query .= ', cod_fornecedor = ' . $fornecedor;
            }
        } elseif ($dataCad != null) {
            $query .= ', data_cadastro = "' . $dataCad . '"';
            if ($fornecedor != null) {
                $query .= ', cod_fornecedor = ' . $fornecedor;
            }
        } elseif ($fornecedor != null) {
            $query .= ', cod_fornecedor = ' . $fornecedor;
        }
    } elseif ($dataFab != null) {
        $query .= 'data_fabricacao = "' . $dataFab . '"';
        if ($dataCad != null) {
            $query .= ', data_cadastro = "' . $dataCad . '"';
            if ($fornecedor != null) {
                $query .= ', cod_fornecedor = ' . $fornecedor;
            }
        } elseif ($fornecedor != null) {
            $query .= ', cod_fornecedor = ' . $fornecedor;
        }
    } elseif ($dataCad != null) {
        $query .= 'data_cadastro = "' . $dataCad . '"';
        if ($fornecedor != null) {
            $query .= ', cod_fornecedor = ' . $fornecedor;
        }
    } elseif ($fornecedor != null) {
        $query .= 'cod_fornecedor = ' . $fornecedor;
    }

    $query .= ' WHERE cod = ' . $cod . ';';             //aqui a variável é terminada com o final da query sendo concatenado
    echo $query;                                        //era usado para testar o código
    alterarCadastro($query);                            //chama a função do CRUD para realizar o update, passando a query por parâmetro
} catch (Exception $ex) {
    echo "Erro: $ex";                                   //essa mensagem eu estava vendo o tempo inteiro quando tentava fazer com botão para cada campo
}                                                       //fazendo com essa montueira de ifelse não vi nenhuma vez
?>