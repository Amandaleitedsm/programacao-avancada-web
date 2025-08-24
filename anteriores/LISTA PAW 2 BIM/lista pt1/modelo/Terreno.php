<?php
class Terreno{
    private $largura;
    private $comprimento;
    public function setComp($comp){
        $this->comprimento = $comp;
    }
    public function setLarg($larg){
        $this->largura = $larg;
    }
    public function getComp(){
        return $this->comprimento;
    }
    public function getLarg(){
        return $this->largura;
    }
    public function area(){
        $area = $this->getComp() * $this->getLarg();
        return $area;
    }
    public function perimetro(){
        $p = ($this->getLarg() * 2)+($this->getComp() * 2);
        return $p;
    }
}
?>