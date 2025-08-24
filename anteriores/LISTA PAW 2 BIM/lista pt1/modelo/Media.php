<?php
class Media{
    private $nota1;
    private $nota2;
    public function setNota1($n1){
        $this->nota1 = $n1;
    }
    public function setNota2($n2){
        $this->nota2 = $n2;
    }
    public function getNota1(){
        return $this->nota1;
    }
    public function getNota2(){
        return $this->nota2;
    }
    public function calcularMedia(){
        $media = ($this->getNota1() + $this->getNota2())/2;
        return $media;
    }
}
?>