<?php
    require_once 'Modelo/Media.php';
    class ControleMedia{
        public function validarN1($n1){
            if (!isset($n1)){
                $objetoResposta = new stdClass();
                $objetoResposta->status = false;
                $objetoResposta->msg = "Não foi enviada a nota 1";
                http_response_code(400);
                echo json_encode($objetoResposta);
                exit();
            }
            if (!is_numeric($n1)){
                $objetoResposta = new stdClass();
                $objetoResposta->status = false;
                $objetoResposta->msg = "A nota 1 deve ser numérica";
                http_response_code(400);
                echo json_encode($objetoResposta);
                exit();
            }
            if ($n1 < 0 || $n1 > 10){
                $objetoResposta = new stdClass();
                $objetoResposta->status = false;
                $objetoResposta->msg = "A nota 1 deve estar entre 0 e 10";
                http_response_code(400);
                echo json_encode($objetoResposta);
                exit();
            }
        }
        public function validarN2($n2){
            if (!isset($n2)){
                $objetoResposta = new stdClass();
                $objetoResposta->status = false;
                $objetoResposta->msg = "Não foi enviada a nota 2";
                http_response_code(400);
                echo json_encode($objetoResposta);
                exit();
            }
            if (!is_numeric($n2)){
                $objetoResposta = new stdClass();
                $objetoResposta->status = false;
                $objetoResposta->msg = "A nota 2 deve ser numérica";
                http_response_code(400);
                echo json_encode($objetoResposta);
                exit();
            }
            if ($n2 < 0 || $n2 > 10){
                $objetoResposta = new stdClass();
                $objetoResposta->status = false;
                $objetoResposta->msg = "A nota 2 deve estar entre 0 e 10";
                http_response_code(400);
                echo json_encode($objetoResposta);
                exit();
            }
        }
        public function controleCalcularMedia($n1, $n2){
            $this->validarN1($n1);
            $this->validarN2($n2);

            $objetoMedia = new Media();
            $objetoMedia->setN1($n1);
            $objetoMedia->setN2($n2);
            $media = $objetoMedia->calcularMedia();
            $situacao = $objetoMedia->calcularSituacao();

            $objetoResposta = new stdClass();
            $objetoResposta->n1 = $objetoMedia->getN1();
            $objetoResposta->n2 = $objetoMedia->getN2();
            $objetoResposta->media = $media;
            $objetoResposta->conceito = $situacao;

            $jsonResposta = json_encode($objetoResposta);
            echo $jsonResposta;
            return $jsonResposta;
        }
        public function controleNota($n1){
            $this->validarN1($n1);
            $this->validarN2($n1);

            $objetoMedia = new Media();
            $objetoMedia->setN1($n1);
            $objetoMedia->setN2($n1);
            $media = $objetoMedia->calcularMedia();
            $situacao = $objetoMedia->calcularSituacao();

            $objetoResposta = new stdClass();
            $objetoResposta->media = $media;
            $objetoResposta->conceito = $situacao;

            $jsonResposta = json_encode($objetoResposta);
            echo $jsonResposta;
            return $jsonResposta;
        }
    }
?>
