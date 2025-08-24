<?php
    require_once 'Modelo/Bhaskara.php';
    class ControleBhaskara{
        public function validarA($a){
            if (!isset($a)){
                $objetoResposta = new stdClass();
                $objetoResposta->status = false;
                $objetoResposta->msg = "Não foi enviado o valor de A";
                http_response_code(400);
                echo json_encode($objetoResposta);
                exit();
            }
            if (!is_numeric($a)){
                $objetoResposta = new stdClass();
                $objetoResposta->status = false;
                $objetoResposta->msg = "O valor de A deve ser numérico";
                http_response_code(400);
                echo json_encode($objetoResposta);
                exit();
            }
            if ($a == 0){
                $objetoResposta = new stdClass();
                $objetoResposta->status = false;
                $objetoResposta->msg = "O valor de A deve ser diferente de zero";
                http_response_code(400);
                echo json_encode($objetoResposta);
                exit();
            }
        }
        public function validarB($b){
            if (!isset($b)){
                $objetoResposta = new stdClass();
                $objetoResposta->status = false;
                $objetoResposta->msg = "Não foi enviado o valor de B";
                http_response_code(400);
                echo json_encode($objetoResposta);
                exit();
            }
            if (!is_numeric($b)){
                $objetoResposta = new stdClass();
                $objetoResposta->status = false;
                $objetoResposta->msg = "O valor de B deve ser numérico";
                http_response_code(400);
                echo json_encode($objetoResposta);
                exit();
            }
        }
        public function validarC($c){
            if (!isset($c)){
                $objetoResposta = new stdClass();
                $objetoResposta->status = false;
                $objetoResposta->msg = "Não foi enviado o valor de C";
                http_response_code(400);
                echo json_encode($objetoResposta);
                exit();
            }
            if (!is_numeric($c)){
                $objetoResposta = new stdClass();
                $objetoResposta->status = false;
                $objetoResposta->msg = "O valor de C deve ser numérico";
                http_response_code(400);
                echo json_encode($objetoResposta);
                exit();
            }
        }
        public function controleBhaskara($a, $b, $c){
            $this->validarA($a);
            $this->validarB($b);
            $this->validarC($c);

            $objBhaskara = new Bhaskara();
            $objBhaskara->setA($a);
            $objBhaskara->setB($b);
            $objBhaskara->setC($c);
            $delta = $objBhaskara->calcularDelta();
            $bhaskara = $objBhaskara->calcularRaizes();

            $objetoResposta = new stdClass();
            $objetoResposta->a = $a;
            $objetoResposta->b = $b;
            $objetoResposta->c = $c;
            $objetoResposta->delta = $delta;
            $objetoResposta->x1 = $bhaskara[0];
            if (isset($bhaskara[1])){
                $objetoResposta->x2 = $bhaskara[1];
            }
            

            $jsonResposta = json_encode($objetoResposta);
            echo $jsonResposta;
            return $jsonResposta;
        }
    }
?>