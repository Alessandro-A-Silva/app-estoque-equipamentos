<?php

require_once __DIR__ . "/Usuario.php";
require_once __DIR__ . "/Fornecedor.php";
class Entrada
{
    private int $id;
    private Usuario $usuario;      // quem registrou a entrada
    private Fornecedor $fornecedor;   // fornecedor da entrada
    private int $tipo;
    private int $situacao;
    private string $descricao;
    private string $dataRegistro;

    public function __construct(
        int $id,
        Usuario $usuario,
        Fornecedor $fornecedor,
        int $tipo,
        int $situacao,
        string $descricao,
        string $dataRegistro
    ) {
        $this->id = $id;
        $this->usuario = $usuario;
        $this->fornecedor = $fornecedor;
        $this->tipo = $tipo;
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

    public function getFornecedor(): Fornecedor
    {
        return $this->fornecedor;
    }

    public function getTipo(): int
    {
        return $this->tipo;
    }

    public function getSituacao(): int
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
