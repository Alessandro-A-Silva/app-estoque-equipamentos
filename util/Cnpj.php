<?php

    class Cnpj
    {
        private string $numero;

        public function __construct(string $numero)
        {
            $this->validar($numero);
            $this->numero = $numero;
        }

        private function validar(string $numero)
        {
            $numero = preg_replace('/[^0-9]/', '', $numero);

            if(strlen($numero) != 14 || preg_match('/(\d)\1{13}/', $numero))
            {
                throw new InvalidArgumentException("Número do cnpj inválido.");
            }

            for($t = 12; $t < 14; $t++)
            {
                $d = 0;
                for($m = $t - 7, $i = 0; $i < $t; $i++, $m--)
                {
                    $m = ($m < 2) ? 9 : $m;
                    $d += $numero[$i] * $m;
                }

                $d = ((10 * $d) % 11) % 10;
                if($numero[$t] != $d)
                {
                    throw new InvalidArgumentException("Número do cnpj inválido.");
                }
            }
        }

        public function getNumero(): string
        {
            return $this->numero;
        }
    }