<?php
    class Combustivel{
        private $combustivel;
        private $km;

        public function getCombustivel()
        {
                return $this->combustivel;
        }
        public function setCombustivel($combustivel)
        {
                $this->combustivel = $combustivel;
                return $this;
        }

        public function getKm()
        {
                return $this->km;
        }
        public function setKm($km)
        {
                $this->km = $km;
                return $this;
        }

        public function calcularMedia(){
            $media = $this->getKm()/$this->getCombustivel();
            return $media;
        }
    }
?>