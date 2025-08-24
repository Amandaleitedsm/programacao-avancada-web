<?php
class Eleitores{
    private $eleitores;
    private $votos;
    public function setValor($e){
        $this->eleitores = $e;
    }
    public function getValor(){
        return $this->eleitores;
    }
    public function setVotos($voto){
        $this->votos = $voto;
    }
    public function getVotos(){
        return $this->votos;
    }
    public function porcentagem(){
        $prct = ($this->getVotos()/$this->getValor())*100;
        return $prct;
    }
}
?>