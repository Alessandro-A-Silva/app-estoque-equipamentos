<?php

    class Cpf
    {
        private string $numero;

        public function __construct(string $numero)
        {
            if(!$this->validar($numero))
               throw new InvalidArgumentException("Número de cpf invalido.");
            else
                $this->numero = $numero;
        }

        public function getNumero(): string
        {
            return $this->numero;
        }

        public function getNumeroFormatado(): string
        {
            return substr($this->numero,0,3)."."
                .substr($this->numero,3,3)."."
                .substr($this->numero,6,3)."-"
                .substr($this->numero,9,2);
        }

        private function validar(string $numero): bool
        {   
            //remove os cara não númericos 
            $numero = preg_replace('/[^0-9]/', '', $numero);
            
            //verifica se o cpf tem 11 digitos ou se os digitos são iguais
            if(strlen($numero) != 11 || preg_match('/(\d)\1{10}/', $numero))
            {
                return false;
            }

            //calcula o digito verificador do cpf
            for ($t = 9; $t < 11; $t++) 
            {
                $soma = 0;
                
                for($i = 0; $i < $t; $i++)
                {
                    $soma += $numero[$i] * (($t + 1) - $i);
                }

                $resto = ($soma * 10) % 11;
                $digito = ($resto == 10) ? 0 : $resto;

                if($numero[$t] != $digito)
                {
                    return false;
                }
            }

            return true;
        }

    }