<?php
    class Temperatura{
        private $n1;
        public function calcularCelsius()
        {
            return ($this->getN1() - 32) * 5/9;
        }
        public function getN1()
        {
                return $this->n1;
        }
        public function setN1($n1)
        {
                $this->n1 = $n1;
                return $this;
        }
    }

?>