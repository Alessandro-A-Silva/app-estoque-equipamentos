<?php

    enum NivelAcesso: string 
    {   
        case basico = "basico";
        case medio = "medio";
        case avancado = "avancado";
        case administrador = "administrador";

        public function descricao(): string
        {
            return match($this)
            {
                self::basico => "Básico",
                self::medio => "Medio",
                self::avancado => "Avançado",
                self::administrador => "Administrador"
            };
        }
    }