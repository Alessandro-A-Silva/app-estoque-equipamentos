<?php

require_once __DIR__ . "/Entrada.php";
require_once __DIR__ . "/Equipamento.php";

class EntradaEquipamento
{
    private int $id;
    private Entrada $entrada;
    private Equipamento $equipamento;
    private int $quantidade;

    public function __construct(
        int $id,
        Entrada $entrada,
        Equipamento $equipamento,
        int $quantidade
    ) {
        $this->id = $id;
        $this->entrada = $entrada;
        $this->equipamento = $equipamento;
        $this->quantidade = $quantidade;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getEntrada(): Entrada
    {
        return $this->entrada;
    }

    public function getEquipamentos(): Equipamento
    {
        return $this->equipamento;
    }

    public function getQuantidade(): int
    {
        return $this->quantidade;
    }
}
