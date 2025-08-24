<?php
    require_once 'Modelo/Horas.php';

    class ControleHoras {
        public function validarHoras($horas){
            if (!isset($horas)){
                $objetoResposta = new stdClass();
                $objetoResposta->status = false;
                $objetoResposta->msg = "Não foram enviadas horas";
                http_response_code(400);
                echo json_encode($objetoResposta);

                exit();
            }
            if (!is_numeric($horas)){
                $objetoResposta = new stdClass();
                $objetoResposta->status = false;
                $objetoResposta->msg = "As horas devem ser numéricas";
                http_response_code(400);
                echo json_encode($objetoResposta);
                exit();
            }
            if ($horas <= 0){
                $objetoResposta = new stdClass();
                $objetoResposta->status = false;
                $objetoResposta->msg = "As horas devem ser maiores que zero";
                http_response_code(400);
                echo json_encode($objetoResposta);
                exit();
            }
        }
        public function controleCalcularMinutos($horas){

            $this->validarHoras($horas);

            $objetoHoras = new Horas();
            $objetoHoras->setHoras($horas);
            $minutos = $objetoHoras->calcularMinutos();

            $objetoResposta = new stdClass();
            $objetoResposta->horas = $objetoHoras->getHoras();
            $objetoResposta->minutos = $minutos;

            $jsonResposta = json_encode($objetoResposta);
            echo $jsonResposta;
            return $jsonResposta;
        }
        public function controleCalcularSegundos($horas){

            $this->validarHoras($horas);

            $objetoHoras = new Horas();
            $objetoHoras->setHoras($horas);
            $segundos = $objetoHoras->calcularSegundos();

            $objetoResposta = new stdClass();
            $objetoResposta->horas = $objetoHoras->getHoras();
            $objetoResposta->segundos = $segundos;

            $jsonResposta = json_encode($objetoResposta);
            echo $jsonResposta;
            return $jsonResposta;
        }
        public function controleCalcularTudo($horas){

            $this->validarHoras($horas);

            $objetoHoras = new Horas();
            $objetoHoras->setHoras($horas);
            $segundos = $objetoHoras->calcularSegundos();
            $minutos = $objetoHoras->calcularMinutos();

            $objetoResposta = new stdClass();
            $objetoResposta->horas = $objetoHoras->getHoras();
            $objetoResposta->segundos = $segundos;
            $objetoResposta->minutos = $minutos;

            $jsonResposta = json_encode($objetoResposta);
            echo $jsonResposta;
            return $jsonResposta;
        }
    }
?>