<?php

    enum SolicitacaoSituacao: string 
    {   
        case pendente = "pendente";
        case aprovada = "aprovada";
        case atendida = "atendida";
        case parcial = "parcial";
        case cancelada = "cancelada";
        case rejeitada = "rejeitada";
        case analise = "analise";

        public function descricao(): string
        {
            return match($this)
            {
                self::pendente => "pendente",
                self::aprovada => "aprovada",
                self::atendida => "atendida",
                self::parcial => "parcial",
                self::cancelada => "cancelada",
                self::rejeitada => "rejeitada",
                self::analise => "analise"
            };
        }
    }