<?php
class Horas{
    private $horas;

    public function setHoras($hora){
        $this->horas = $hora;
    }
    public function calcularMinutos(){
        $min = $this->getHoras() * 60;
        return $min;
    }
    public function getHoras(){
        return $this->horas;
    }
}
?>