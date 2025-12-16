<?php

    enum EquipamentoTipo: string
    {
        case epi = "epi";
        case epc = "epc";
        case peca = "peca";
        case ferramenta = "ferramenta";
        case materiaPrima = "materia-prima";
        case outro = "outro";

        public function descricao(): string
        {
            return match($this)
            {
                self::epi => "EPI",
                self::epc => "EPC",
                self::peca => "Peça",
                self::ferramenta => "Ferramenta",
                self::materiaPrima => "Matéria-prima",
                self::outro => "Outro"
            };
        }
    }