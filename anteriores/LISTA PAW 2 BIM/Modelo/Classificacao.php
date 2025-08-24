<?php
    class Classificacao{
        private $idade;
        
        public function classificar(){
            if((5 <= $this->getIdade()) and ($this->getIdade()<= 7)){
                return "Infantil A";
            }else if($this->getIdade()>7 and $this->getIdade() <= 11){
                return "Infantil B";
            }else if($this->getIdade()>11 and $this->getIdade() <= 13){
                return "Juvenil A";
            }else if($this->getIdade()>13 and $this->getIdade() <= 17){
                return "Juvenil B";
            }else if($this->getIdade() > 18){
                return "Adulto";
            }else{
                return "Não há classificação";
            }
        }
        public function getIdade()
        {
                return $this->idade;
        }
        public function setIdade($idade)
        {
                $this->idade = $idade;

                return $this;
        }
    }
?>
