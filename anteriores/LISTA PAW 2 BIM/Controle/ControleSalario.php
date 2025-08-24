<?php
require_once 'Modelo/Salario.php';
class ControleSalario{
    public function validarSalario($salario){
        if (!isset($salario)){
            $objetoResposta = new stdClass();
            $objetoResposta->status = false;
            $objetoResposta->msg = "Não foi enviado o Salario";
            http_response_code(400);
            echo json_encode($objetoResposta);
            exit();
        }
        if (!is_numeric($salario)){
            $objetoResposta = new stdClass();
            $objetoResposta->status = false;
            $objetoResposta->msg = "O Salario deve ser numérico";
            http_response_code(400);
            echo json_encode($objetoResposta);
            exit();
        }
        if ($salario <= 0){
            $objetoResposta = new stdClass();
            $objetoResposta->status = false;
            $objetoResposta->msg = "O Salario deve ser maior que zero";
            http_response_code(400);
            echo json_encode($objetoResposta);
            exit();
        }
    }
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
    public function validarValorHoras($valorhoras){
        if (!isset($valorhoras)){
            $objetoResposta = new stdClass();
            $objetoResposta->status = false;
            $objetoResposta->msg = "Não foi enviado valor de horas";
            http_response_code(400);
            echo json_encode($objetoResposta);
            exit();
        }
        if (!is_numeric($valorhoras)){
            $objetoResposta = new stdClass();
            $objetoResposta->status = false;
            $objetoResposta->msg = "o valor das horas deve ser numérico";
            http_response_code(400);
            echo json_encode($objetoResposta);
            exit();
        }
        if ($valorhoras <= 0){
            $objetoResposta = new stdClass();
            $objetoResposta->status = false;
            $objetoResposta->msg = "O valor de horas deve ser maior que zero";
            http_response_code(400);
            echo json_encode($objetoResposta);
            exit();
        }
    }
    public function controleCalcularSalario($salario, $horas, $valorhoras){
        $this->validarSalario($salario);
        $this->validarHoras($horas);
        $this->validarValorHoras($valorhoras);

        $objetoSalario = new Salario();
        $objetoSalario->setSalario($salario);
        $objetoSalario->setHorasx($horas);
        $objetoSalario->setValorhoras($valorhoras);
        $salarioLiquido = $objetoSalario->calcularSalario();

        $objetoResposta = new stdClass();
        $objetoResposta->salarioBruto = $objetoSalario->getSalario();
        $objetoResposta->valorHoraExtra = $objetoSalario->getValorHoras();
        $objetoResposta->totalHorasExtras = $objetoSalario->getHorasx();
        $objetoResposta->salarioLiquido = $salarioLiquido;

        $jsonResposta = json_encode($objetoResposta);
        echo $jsonResposta;
        return $jsonResposta;
    }
}
?>