<?php
    require_once 'Modelo/Temperatura.php';
    class ControleTemperatura{
        public function validarN1($n1){
            if (!isset($n1)){
                $objetoResposta = new stdClass();
                $objetoResposta->status = false;
                $objetoResposta->msg = "Não foi enviada a n1";
                http_response_code(400);
                echo json_encode($objetoResposta);
                exit();
            }
            if (!is_numeric($n1)){
                $objetoResposta = new stdClass();
                $objetoResposta->status = false;
                $objetoResposta->msg = "A n1 deve ser numérica";
                http_response_code(400);
                echo json_encode($objetoResposta);
                exit();
            }
        }
        public function validarN2($n2){
            if (!isset($n2)){
                $objetoResposta = new stdClass();
                $objetoResposta->status = false;
                $objetoResposta->msg = "Não foi enviada a n2";
                http_response_code(400);
                echo json_encode($objetoResposta);
                exit();
            }
            if (!is_numeric($n2)){
                $objetoResposta = new stdClass();
                $objetoResposta->status = false;
                $objetoResposta->msg = "A n2 deve ser numérica";
                http_response_code(400);
                echo json_encode($objetoResposta);
                exit();
            }
        }
        public function controleCalcularCelsius($n1){
            $this->validarN1($n1);

            $objetoTemperatura = new Temperatura();
            $objetoTemperatura->setN1($n1);
            $celsius = $objetoTemperatura->calcularCelsius();

            $objetoResposta = new stdClass();
            $objetoResposta->{$n1 . "°F"} = $celsius . "°C";

            $jsonResposta = json_encode($objetoResposta);
            echo $jsonResposta;
            return $jsonResposta;
        }
        public function controleCelsiusIntervalo($n1, $n2){
            $this->validarN1($n1);
            $this->validarN2($n2);

            if ($n1 > $n2) {
                http_response_code(400);
                $erro = new stdClass();
                $erro->status = false;
                $erro->erro = 'A temperatura inicial (n1) deve ser menor ou igual à final (n2).';
                echo json_encode($erro);
                exit();
            }

            $objetoTemperatura = new Temperatura();
            $objetoResposta = new stdClass();

            for ($i = $n1; $i <= $n2; $i++) {
                $objetoTemperatura->setN1($i);
                $celsius = $objetoTemperatura->calcularCelsius();
                $formatarcelsius = number_format($celsius, 3);
                $objetoResposta->{$i . "°F"} = $formatarcelsius . "°C";
            }
            
            $jsonResposta = json_encode($objetoResposta);
            echo $jsonResposta;
            return $jsonResposta;
        }
    }
?>