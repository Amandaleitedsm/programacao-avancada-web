<?php
    class Terreno{
        private $base;
        private $altura;
        
        public function calcularArea(){
            return $this->getBase() * $this->getAltura();
        }
        public function getBase()
        {
                return $this->base;
        }
        public function setBase($base)
        {
                $this->base = $base;
                return $this;
        }
        public function getAltura()
        {
                return $this->altura;
        }
        public function setAltura($altura)
        {
                $this->altura = $altura;
                return $this;
        }
    }
?>