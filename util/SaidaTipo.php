<?php

    enum SaidaTipo: string
    {
        case requisicao = "requisicao";
        case transferencia = "transferencia";
        case devolucao = "devolucao";
        case descarte = "descarte";
        case ajuste = "ajuste";
        case consumo = "consumo";
        case doacao = "doacao";
        case venda = "venda";

        public function descricao(): string
        {
            return match($this)
            {
                self::requisicao => "Requisição",
                self::transferencia => "Transferência",
                self::devolucao => "Devolução", 
                self::descarte => "Descarte",
                self::ajuste => "Ajuste",
                self::consumo => "Consumo",
                self::doacao => "Doação",
                self::venda => "Venda"
            };
        }

    }