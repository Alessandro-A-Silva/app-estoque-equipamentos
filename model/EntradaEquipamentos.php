<?php

require_once __DIR__ . "/Entrada.php";
require_once __DIR__ . "/Equipamentos.php";

class EntradaEquipamentos
{
    private int $id;
    private Entrada $entrada;
    private Equipamentos $equipamentos;
    private int $quantidade;

    public function __construct(
        int $id,
        Entrada $entrada,
        Equipamentos $equipamentos,
        int $quantidade
    ) {
        $this->id = $id;
        $this->entrada = $entrada;
        $this->equipamentos = $equipamentos;
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

    public function getEquipamentos(): Equipamentos
    {
        return $this->equipamentos;
    }

    public function getQuantidade(): int
    {
        return $this->quantidade;
    }
}
