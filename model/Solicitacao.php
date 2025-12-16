<?php

require_once __DIR__ . "./Usuario.php"; // usa sua classe já existente
require_once __DIR__ . "./Setor.php";
require_once __DIR__ . "/../util/SolicitacaoSituacao.php";

class Solicitacao {
    private int $id;
    private Usuario $usuario;
    private Setor $setor;  
    private SolicitacaoSituacao $situacao;
    private string $descricao; 
    private string $dataRegistro;

    public function __construct(
        int $id,
        Usuario $usuario,
        Setor $setor,
        SolicitacaoSituacao $situacao,
        string $descricao,
        string $dataRegistro
    ) {
        $this->id = $id;
        $this->usuario = $usuario;
        $this->setor = $setor;
        $this->situacao = $situacao;
        $this->descricao = $descricao;
        $this->dataRegistro = $dataRegistro;
    }

    public function getId(): int 
    {
        return $this->id;
    }

    public function getUsuario(): Usuario 
    {
        return $this->usuario;
    }

    public function getSetor(): Setor
    {
        return $this->setor;
    }

    public function getSituacao(): SolicitacaoSituacao 
    {
        return $this->situacao;
    }

    public function getDescricao(): string 
    {
        return $this->descricao;
    }

    public function getdataRegistro(): string
    {
        return $this->dataRegistro;
    }
}
