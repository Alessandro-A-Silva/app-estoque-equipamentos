<?php

require_once __DIR__ . "./Usuario.php"; // usa sua classe já existente

class Solicitacao {
    private int $id;
    private Usuario $usuario;  
    private string $situacao;
    private string $descricao; 
    private string $dataRegistro;

    public function __construct(
        int $id,
        Usuario $usuario,
        string $situacao,
        string $descricao,
        string $dataRegistro
    ) {
        $this->id = $id;
        $this->usuario = $usuario;
        $this->situacao = $situacao;
        $this->descricao = $descricao;
        $this->dataRegistro = $dataRegistro;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getUsuario(): Usuario {
        return $this->usuario;
    }

    public function getSituacao(): string {
        return $this->situacao;
    }

    public function getDescricao(): string {
        return $this->descricao;
    }

    public function getdataRegistro(): string{
        return $this->dataRegistro;
    }
}

?>