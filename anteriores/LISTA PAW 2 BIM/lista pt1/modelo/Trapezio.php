<?php
class Trapezio{
    private $B;
    private $b;
    private $h;

    public function getBM(){
        return $this->B;
    }
    public function setBM($B){
        $this->B = $B;
        return $this;
    }

    public function getb(){
        return $this->b;
    }

    public function setb($b)
    {
        $this->b = $b;
        return $this;
    }
    public function getH(){
        return $this->h;
    }
    public function setH($h){
        $this->h = $h;

        return $this;
    }
    public function areaTrapezio(){
        $A = (($this->getb() +$this->getBM())*$this->getH())/2;
        return $A;
    }
}
?>