<?php
class Idade{
    private $idade;
    public function setIdade($numidade){
        $this->idade = $numidade;
    }
    public function getIdade(){
        return $this->idade;
    }
    public function dias(){
        $dias = $this->getIdade() * 365;
        return $dias;
    }
    public function horas(){
        $horas = $this->dias() * 24;
        return $horas;
    }
    public function minutos(){
        $minutos = $this->horas() * 60;
        return $minutos;
    }
    public function segundos(){
        $segundos = $this->minutos() * 60;
        return $segundos;
    }
}
?>