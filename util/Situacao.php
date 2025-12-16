<?php

    enum Situacao: string
    {
        case ativa = "ativa";
        case cancelada = "cancelada";

        public function descricao(): string
        {
            return match($this)
            {
                self::ativa => "Ativa",
                self::cancelada => "Cancelada"
            };
        }
    }