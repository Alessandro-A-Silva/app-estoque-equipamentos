<?php

class Equipamentos
{
    private int $id;
    private string $nome;
    private string $descricao;
    private string $marca;
    private int $tipo;
    private string $ca;
    private string $caValidade;
    private int $quantidade;

    public function __construct(
        int $id,
        string $nome,
        string $descricao,
        string $marca,
        int $tipo,
        string $ca,
        string $caValidade,
        int $quantidade
    ) {
        $this->id = $id;
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->marca = $marca;
        $this->tipo = $tipo;
        $this->ca = $ca;
        $this->caValidade = $caValidade;
        $this->quantidade = $quantidade;
    }

    // Getters
    public function getId(): int
    {
        return $this->id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function getMarca(): string
    {
        return $this->marca;
    }

    public function getTipo(): int
    {
        return $this->tipo;
    }

    public function getCa(): string
    {
        return $this->ca;
    }

    public function getCaValidade(): string
    {
        return $this->caValidade;
    }

    public function getQuantidade(): int
    {
        return $this->quantidade;
    }
}
