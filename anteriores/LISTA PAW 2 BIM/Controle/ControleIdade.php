<?php
    require_once 'Modelo/Idade.php';
    
    class ControleIdade {
        public function validarIdade($idade){
            if (!isset($idade)){
                $objetoResposta = new stdClass();
                $objetoResposta->status = false;
                $objetoResposta->msg = "Não foi enviada a idade";
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
            if ($idade <= 0){
                $objetoResposta = new stdClass();
                $objetoResposta->status = false;
                $objetoResposta->msg = "A idade deve ser maior que zero";
                http_response_code(400);
                echo json_encode($objetoResposta);
                exit();
            }
        }
        public function controleCalcularDias($idade){
    
            $this->validarIdade($idade);
    
            $objetoIdade = new Idade();
            $objetoIdade->setIdade($idade);
            $dias = $objetoIdade->calcularDias();
    
            $objetoResposta = new stdClass();
            $objetoResposta->anos = $objetoIdade->getIdade();
            $objetoResposta->dias = $dias;
    
            $jsonResposta = json_encode($objetoResposta);
            echo $jsonResposta;
            return $jsonResposta;
        }
        public function controleCalcularHoras($idade){
    
            $this->validarIdade($idade);
    
            $objetoIdade = new Idade();
            $objetoIdade->setIdade($idade);
            $horas = $objetoIdade->calcularHoras();
    
            $objetoResposta = new stdClass();
            $objetoResposta->anos = $objetoIdade->getIdade();
            $objetoResposta->horas = $horas;
    
            $jsonResposta = json_encode($objetoResposta);
            echo $jsonResposta;
            return $jsonResposta;
        }
        public function controleCalcularMinutos($idade){
    
            $this->validarIdade($idade);
            $objetoIdade = new Idade();
            $objetoIdade->setIdade($idade);
            $minutos = $objetoIdade->calcularMinutos();

            $objetoResposta = new stdClass();
            $objetoResposta->anos = $objetoIdade->getIdade();
            $objetoResposta->minutos = $minutos;

            $jsonResposta = json_encode($objetoResposta);
            echo $jsonResposta;
            return $jsonResposta;
        }
        public function controleCalcularSegundos($idade){

            $this->validarIdade($idade);

            $objetoIdade = new Idade();
            $objetoIdade->setIdade($idade);
            $segundos = $objetoIdade->calcularSegundos();

            $objetoResposta = new stdClass();
            $objetoResposta->anos = $objetoIdade->getIdade();
            $objetoResposta->segundos = $segundos;

            $jsonResposta = json_encode($objetoResposta);
            echo $jsonResposta;
            return $jsonResposta;
        }

        public function controleCalcularTudo($idade){

            $this->validarIdade($idade);

            $objetoIdade = new Idade();
            $objetoIdade->setIdade($idade);
            $segundos = $objetoIdade->calcularSegundos();
            $minutos = $objetoIdade->calcularMinutos();
            $dias = $objetoIdade->calcularDias();
            $horas = $objetoIdade->calcularHoras();

            $objetoResposta = new stdClass();
            $objetoResposta->anos = $objetoIdade->getIdade();
            $objetoResposta->dias = $dias;
            $objetoResposta->horas = $horas;
            $objetoResposta->minutos = $minutos;
            $objetoResposta->segundos = $segundos;

            $jsonResposta = json_encode($objetoResposta);
            echo $jsonResposta;
            return $jsonResposta;
        }
    }
?>