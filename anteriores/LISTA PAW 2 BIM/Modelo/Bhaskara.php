<?php
    class Bhaskara{
        private $a;
        private $b;
        private $c;
        
        public function calcularDelta()
        {
                return ($this->b * $this->b) - (4 * $this->a * $this->c);
        }
        public function calcularRaizes()
        {
                $delta = $this->calcularDelta();
                if ($delta < 0) {
                        return ["Não há raíz real para delta negativo"]; // Não há raízes reais
                } elseif ($delta == 0) {
                        $raiz = -$this->b / (2 * $this->a);
                        return [$raiz]; // Uma raiz real
                } else {
                        $raiz1 = (-$this->b + sqrt($delta)) / (2 * $this->a);
                        $raiz2 = (-$this->b - sqrt($delta)) / (2 * $this->a);
                        return [$raiz1, $raiz2]; // Duas raízes reais
                }
        }
        public function getA()
        {
                return $this->a;
        }
        public function setA($a)
        {
                $this->a = $a;

                return $this;
        }
        public function getB()
        {
                return $this->b;
        }
        public function setB($b)
        {
                $this->b = $b;

                return $this;
        }
        public function getC()
        {
                return $this->c;
        }
        public function setC($c)
        {
                $this->c = $c;

                return $this;
        }
    }
?>