<?php
    require_once 'Modelo/Classificacao.php';
    class ControleClassificacao{
        public function validarIdade($idade){
            if (!isset($idade)){
                $objetoResposta = new stdClass();
                $objetoResposta->status = false;
                $objetoResposta->msg = "Não foi enviado a idade";
                http_response_code(400);
                echo json_encode($objetoResposta);
                exit();
            }
            if (!is_numeric($idade)){
                $objetoResposta = new stdClass();
                $objetoResposta->status = false;
                $objetoResposta->msg = "A idade deve ser numérica";
                http_response_code(400);
                echo json_encode($objetoResposta);
                exit();
            }
            if ($idade < 0){
                $objetoResposta = new stdClass();
                $objetoResposta->status = false;
                $objetoResposta->msg = "A idade deve ser maior ou igual a zero";
                http_response_code(400);
                echo json_encode($objetoResposta);
                exit();
            }
        }
        public function controleClassificar($idade){
            $this->validarIdade($idade);

            $objClassificacao = new Classificacao();
            $objClassificacao->setIdade($idade);
            $classificacao = $objClassificacao->classificar();

            $objetoResposta = new stdClass();
            $objetoResposta->idade = $idade;
            $objetoResposta->categoria = $classificacao;

            $jsonResposta = json_encode($objetoResposta);
            echo $jsonResposta;
            return $jsonResposta;
        }
    }
?>