<?php
class Temperatura{
    private $F;
    public function getF()
    {
        return $this->F;
    }
    public function setF($F)
    {
        $this->F = $F;
        return $this;
    }
    public function calcularCelsius(){
        $C = (5.0/9.0)*($this->getF()-32);
        return $C;
    }
}
?>