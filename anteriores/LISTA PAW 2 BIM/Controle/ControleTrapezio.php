<?php
require_once 'Modelo/Trapezio.php';
class ControleTrapezio{
    public function validarBaseMaior($BaseMaior){
        if (!isset($BaseMaior)){
            $objetoResposta = new stdClass();
            $objetoResposta->status = false;
            $objetoResposta->msg = "Não foi enviado o Base Maior";
            http_response_code(400);
            echo json_encode($objetoResposta);
            exit();
        }
        if (!is_numeric($BaseMaior)){
            $objetoResposta = new stdClass();
            $objetoResposta->status = false;
            $objetoResposta->msg = "O Base Maior deve ser numérico";
            http_response_code(400);
            echo json_encode($objetoResposta);
            exit();
        }
        if ($BaseMaior <= 0){
            $objetoResposta = new stdClass();
            $objetoResposta->status = false;
            $objetoResposta->msg = "O Base Maior deve ser maior que zero";
            http_response_code(400);
            echo json_encode($objetoResposta);
            exit();
        }
    }
    public function validarBaseMenor($BaseMenor){
        if (!isset($BaseMenor)){
            $objetoResposta = new stdClass();
            $objetoResposta->status = false;
            $objetoResposta->msg = "Não foi enviada a Base Menor";
            http_response_code(400);
            echo json_encode($objetoResposta);
            exit();
        }
        if (!is_numeric($BaseMenor)){
            $objetoResposta = new stdClass();
            $objetoResposta->status = false;
            $objetoResposta->msg = "A Base Menor deve ser numérica";
            http_response_code(400);
            echo json_encode($objetoResposta);
            exit();
        }
        if ($BaseMenor <= 0){
            $objetoResposta = new stdClass();
            $objetoResposta->status = false;
            $objetoResposta->msg = "A Base Menor deve ser maior que zero";
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
    public function controleCalcularArea($BaseMaior, $BaseMenor, $Altura){
        $this->validarBaseMaior($BaseMaior);
        $this->validarBaseMenor($BaseMenor);
        $this->validarAltura($Altura);

        $objetoTrapezio = new Trapezio();
        $objetoTrapezio->setBaseMaior($BaseMaior);
        $objetoTrapezio->setBaseMenor($BaseMenor);
        $objetoTrapezio->setAltura($Altura);
        $area = $objetoTrapezio->calcularArea();

        $objetoResposta = new stdClass();
        $objetoResposta->BaseMaior = $objetoTrapezio->getBaseMaior();
        $objetoResposta->BaseMenor = $objetoTrapezio->getBaseMenor();
        $objetoResposta->Altura = $objetoTrapezio->getAltura();
        $objetoResposta->area = $area;

        $jsonResposta = json_encode($objetoResposta);
        echo $jsonResposta;
        return $jsonResposta;
    }
}
?>