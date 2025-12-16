<?php

require_once __DIR__ . "/Usuario.php";
require_once __DIR__ . "/Solicitacao.php";
require_once __DIR__ . "/../util/SaidaTipo.php";
require_once __DIR__ . "/../util/Situacao.php";

class Saida
{
    private int $id;
    private Solicitacao $solicitacao;
    private Usuario $usuario;
    private SaidaTipo $tipo;
    private Situacao $situacao;
    private string $descricao;
    private string $dataRegistro;

    public function __construct(
        int $id,
        Solicitacao $solicitacao,
        Usuario $usuario,
        SaidaTipo $tipo,
        Situacao $situacao,
        string $descricao,
        string $dataRegistro
    ) {
        $this->id = $id;
        $this->solicitacao = $solicitacao;
        $this->usuario = $usuario;
        $this->tipo = $tipo;
        $this->situacao = $situacao;
        $this->descricao = $descricao;
        $this->dataRegistro = $dataRegistro;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getSolicitacao(): Solicitacao
    {
        return $this->solicitacao;
    }

    public function getUsuario(): Usuario
    {
        return $this->usuario;
    }

    public function getTipo(): SaidaTipo
    {
        return $this->tipo;
    }

    public function getSituacao(): Situacao
    {
        return $this->situacao;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function getDataRegistro(): string
    {
        return $this->dataRegistro;
    }
}
