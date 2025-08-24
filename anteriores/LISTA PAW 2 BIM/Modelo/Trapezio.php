<?php
    class Trapezio{
        private $B;
        private $b;
        private $h;

        public function getBaseMaior(){
            return $this->B;
        }
        public function setBaseMaior($B){
            $this->B = $B;
            return $this;
        }

        public function getBaseMenor(){
            return $this->b;
        }

        public function setBaseMenor($b)
        {
            $this->b = $b;
            return $this;
        }
        public function getAltura(){
            return $this->h;
        }
        public function setAltura($h){
            $this->h = $h;
            return $this;
        }
        public function calcularArea(){
            $A = (($this->getBaseMenor() +$this->getBaseMaior())*$this->getAltura())/2;
            return $A;
        }
    }
?>