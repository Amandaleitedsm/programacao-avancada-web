<?php
    class Idade{
        private $Idade;

        public function calcularDias()
        {
                return $this->getIdade() * 365;
        }
        public function calcularHoras()
        {
                return $this->calcularDias() * 24;
        }
        public function calcularMinutos()
        {
                return $this->calcularHoras() * 60;
        }
        public function calcularSegundos()
        {
                return $this->calcularMinutos() * 60;
        }
        public function getIdade()
        {
                return $this->Idade;
        }
        public function setIdade($Idade)
        {
                $this->Idade = $Idade;
                return $this;
        }
    }
?>