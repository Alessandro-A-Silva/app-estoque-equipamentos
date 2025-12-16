<?php

    enum EntradaTipo : string
    {
        case compra = "compra";
        case doacao = "doacao";
        case transferencia = "transferencia";
        case devolucao = "devolucao";
        case ajuste = "ajuste";

        public function descricao(): string
        {
            return match($this)
            {
                self::compra => "Compra",
                self::doacao => "Doação",
                self::transferencia => "Transferência",
                self::devolucao => "Devolução",
                self::ajuste => "Ajuste"
            };
        }
    }