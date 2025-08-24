<?php
    class Salario{
        private $salario;
        private $horasx;
        private $valorhoras;
        public function getSalario(){
            return $this->salario;
        }
        public function setSalario($salario){
            $this->salario = $salario;
            return $this;
        }
        
        public function getHorasx(){
            return $this->horasx;
        }

        public function setHorasx($horasx){
            $this->horasx = $horasx;
            return $this;
        }
        public function getValorhoras()
        {
            return $this->valorhoras;
        }
        public function setValorhoras($valorhoras)
        {
            $this->valorhoras = $valorhoras;
            return $this;
        }
        public function calcularSalario(){
            $total = ($this->getSalario() + ($this->getHorasx()*$this->getValorhoras()));
            $sl = $total - (0.08*$total);
            return $sl;
        }
    }
?>