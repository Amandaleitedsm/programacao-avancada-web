<?php
    class Energia{
        private $kw;
        public function getKw()
        {
                return $this->kw;
        }
        public function setKw($kw)
        {
                $this->kw = $kw;
                return $this;
        }
        public function calcularTotal(){
            $valor = ($this->getKw()*0.12);
            $total = $valor + ($valor*0.18);
            return $total;
        }
    }
?>