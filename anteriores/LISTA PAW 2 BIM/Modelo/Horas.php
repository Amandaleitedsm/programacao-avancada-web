<?php
    class Horas {
        private $horas;
        
        public function calcularMinutos(){
            return $this->getHoras() * 60;
        }
        public function calcularSegundos(){
            return $this->getHoras() * 3600;
        }
        public function getHoras()
        {
                return $this->horas;
        }
        public function setHoras($horas)
        {
                $this->horas = $horas;
                return $this;
        }
    }
?>
