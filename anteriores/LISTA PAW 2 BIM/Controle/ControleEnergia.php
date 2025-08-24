<?php
    require_once 'Modelo/Energia.php';
    class ControleEnergia{
        public function validarKw($kw){
            if (!isset($kw)){
                $objetoResposta = new stdClass();
                $objetoResposta->status = false;
                $objetoResposta->msg = "Não foi enviado o kW";
                http_response_code(400);
                echo json_encode($objetoResposta);
                exit();
            }
            if (!is_numeric($kw)){
                $objetoResposta = new stdClass();
                $objetoResposta->status = false;
                $objetoResposta->msg = "O kW deve ser numérico";
                http_response_code(400);
                echo json_encode($objetoResposta);
                exit();
            }
            if ($kw < 0){
                $objetoResposta = new stdClass();
                $objetoResposta->status = false;
                $objetoResposta->msg = "O kW deve ser maior ou igual a zero";
                http_response_code(400);
                echo json_encode($objetoResposta);
                exit();
            }
        }
        public function controleCalcularTotal($kw){
            $this->validarKw($kw);

            $objEnergia = new Energia();
            $objEnergia->setKw($kw);
            $total = $objEnergia->calcularTotal();

            $objetoResposta = new stdClass();
            $objetoResposta->quilowatts = $kw;
            $objetoResposta->valorQuilowatts = 0.12;
            $objetoResposta->imposto = "18%";
            $objetoResposta->totalPagar = $total;

            $jsonResposta = json_encode($objetoResposta);
            echo $jsonResposta;
            return $jsonResposta;
        }
    }
?>