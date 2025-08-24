<?php
require_once 'Modelo/Media.php';
class Media{
    private $n1;
    private $n2;

    public function calcularMedia()
    {
        return ($this->getN1() + $this->getN2()) / 2;
    }
    public function calcularSituacao()
    {
        $media = $this->calcularMedia();
        if ($media >= 6) {
            return "Aprovado";
        } else {
            return "Reprovado";
        }
    }
    public function getN1()
    {
        return $this->n1;
    }
    public function setN1($n1)
    {
        $this->n1 = $n1;
        return $this;
    }
    public function getN2()
    {
        return $this->n2;
    }
    public function setN2($n2)
    {
        $this->n2 = $n2;
        return $this;
    }
}
?>