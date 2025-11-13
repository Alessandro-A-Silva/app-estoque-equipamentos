<?php

    enum NivelAcesso: string 
    {
        case admin = "admin";
        case alm = "alm";
        case sst = "sst";
        case rh = "rh";
        case user = "user";
        case userx = "userx";

        public function descricao(): string
        {
            return match($this)
            {
                self::admin => "Administrador do sistema",
                self::alm => "Almoxarifado",
                self::sst => "Saúde e segurança do trabalho",
                self::rh => "Recursos humanos",
                self::user => "Usuário padrão",
                self::userx => "Usuário espécial"
            };
        }
    }