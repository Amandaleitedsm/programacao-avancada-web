<?php
    require_once 'Modelo/Combustivel.php';
    class ControleCombustivel{
        public function validarCombustivel($combustivel){
            if (!isset($combustivel)){
                $objetoResposta = new stdClass();
                $objetoResposta->status = false;
                $objetoResposta->msg = "Não foi enviado o combustível";
                http_response_code(400);
                echo json_encode($objetoResposta);
                exit();
            }
            if (!is_numeric($combustivel)){
                $objetoResposta = new stdClass();
                $objetoResposta->status = false;
                $objetoResposta->msg = "O combustível deve ser numérico";
                http_response_code(400);
                echo json_encode($objetoResposta);
                exit();
            }
            if ($combustivel < 0){
                $objetoResposta = new stdClass();
                $objetoResposta->status = false;
                $objetoResposta->msg = "O combustível deve ser maior ou igual a zero";
                http_response_code(400);
                echo json_encode($objetoResposta);
                exit();
            }
        }
        public function validarKm($km){
            if (!isset($km)){
                $objetoResposta = new stdClass();
                $objetoResposta->status = false;
                $objetoResposta->msg = "Não foi enviado o km";
                http_response_code(400);
                echo json_encode($objetoResposta);
                exit();
            }
            if (!is_numeric($km)){
                $objetoResposta = new stdClass();
                $objetoResposta->status = false;
                $objetoResposta->msg = "O km deve ser numérico";
                http_response_code(400);
                echo json_encode($objetoResposta);
                exit();
            }
            if ($km < 0){
                $objetoResposta = new stdClass();
                $objetoResposta->status = false;
                $objetoResposta->msg = "O km deve ser maior ou igual a zero";
                http_response_code(400);
                echo json_encode($objetoResposta);
                exit();
            }
        }
        public function controleCalcularMedia($combustivel, $km){
            $this->validarCombustivel($combustivel);
            $this->validarKm($km);

            $objCombustivel = new Combustivel();
            $objCombustivel->setCombustivel($combustivel);
            $objCombustivel->setKm($km);
            $media = $objCombustivel->calcularMedia();

            $objetoResposta = new stdClass();
            $objetoResposta->kmRodados = $km;
            $objetoResposta->litrosCombustivel = $combustivel;
            $objetoResposta->consumo = "$media km/L";

            $jsonResposta = json_encode($objetoResposta);
            echo $jsonResposta;
            return $jsonResposta;
        }
    }
?>