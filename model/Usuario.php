<?php

    require_once __DIR__ ."/../util/NivelAcesso.php";

    class Usuario
    {
        private int $id;
        private int $idFuncionario;
        private NivelAcesso $nivelAcesso;
        private string $nome;
        private string $senha;

    }