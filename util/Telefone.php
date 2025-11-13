<?php

    class Telefone
    {
        public $numero;

        public function __construct(string $numero)
        {
            $this->validar($numero);
            $this->numero = $numero;
        }

        public function validar(string $numero)
        {
            $numero = preg_replace('/[^0-9]/', '', $numero);
            
            if(strlen($numero) != 0 && strlen($numero) != 10 && strlen($numero) != 11)
            {
                throw new InvalidArgumentException("Número de telefone inválido.");
            }
        }

        public function getNumero(): string
        {
            return $this->numero;
        }

        public function getNumeroFormatado(): string
        {   
            if(strlen($this->numero) == 0)
            {
                return $this->numero;
            }
           
           return "(".substr($this->numero,0,2).") ".
            (strlen($this->numero) == 10 ? "" : substr($this->numero, 2, 1) ). " ".
            (strlen($this->numero) == 10 ? substr($this->numero, 2, 4) : substr($this->numero,3,4))."-".
            (strlen($this->numero) == 10 ? substr($this->numero,6,4) : substr($this->numero, 7,4));
        }
    }