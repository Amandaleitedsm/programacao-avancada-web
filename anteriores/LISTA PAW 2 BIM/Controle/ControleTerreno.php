<?php
    require_once 'Modelo/Terreno.php';
    class ControleTerreno{
        public function validarBase($Base){
            if (!isset($Base)){
                $objetoResposta = new stdClass();
                $objetoResposta->status = false;
                $objetoResposta->msg = "Não foi enviado o Base";
                http_response_code(400);
                echo json_encode($objetoResposta);
                exit();
            }
            if (!is_numeric($Base)){
                $objetoResposta = new stdClass();
                $objetoResposta->status = false;
                $objetoResposta->msg = "O Base deve ser numérico";
                http_response_code(400);
                echo json_encode($objetoResposta);
                exit();
            }
            if ($Base <= 0){
                $objetoResposta = new stdClass();
                $objetoResposta->status = false;
                $objetoResposta->msg = "O Base deve ser maior que zero";
                http_response_code(400);
                echo json_encode($objetoResposta);
                exit();
            }
        }
        public function validarAltura($Altura){
            if (!isset($Altura)){
                $objetoResposta = new stdClass();
                $objetoResposta->status = false;
                $objetoResposta->msg = "Não foi enviada a Altura";
                http_response_code(400);
                echo json_encode($objetoResposta);
                exit();
            }
            if (!is_numeric($Altura)){
                $objetoResposta = new stdClass();
                $objetoResposta->status = false;
                $objetoResposta->msg = "A Altura deve ser numérica";
                http_response_code(400);
                echo json_encode($objetoResposta);
                exit();
            }
            if ($Altura <= 0){
                $objetoResposta = new stdClass();
                $objetoResposta->status = false;
                $objetoResposta->msg = "A Altura deve ser maior que zero";
                http_response_code(400);
                echo json_encode($objetoResposta);
                exit();
            }
        }
        public function controleCalcularArea($Base, $Altura){
            $this->validarBase($Base);
            $this->validarAltura($Altura);

            $objetoTerreno = new Terreno();
            $objetoTerreno->setBase($Base);
            $objetoTerreno->setAltura($Altura);
            $area = $objetoTerreno->calcularArea();

            $objetoResposta = new stdClass();
            $objetoResposta->Base = $objetoTerreno->getBase();
            $objetoResposta->Altura = $objetoTerreno->getAltura();
            $objetoResposta->Area = $area;
            
            $jsonResposta = json_encode($objetoResposta);
            echo $jsonResposta;
            return $jsonResposta;
        }
    }

?>