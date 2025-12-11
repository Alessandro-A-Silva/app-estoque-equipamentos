<?php

require_once __DIR__ . "/Saida.php";
require_once __DIR__ . "/Equipamentos.php";

class SaidaEquipamento
{
    private int $id;
    private Saida $saida;
    private Equipamentos $equipamentos;
    private int $quantidade;

    public function __construct(
        int $id,
        Saida $saida,
        Equipamentos $equipamentos,
        int $quantidade
    ) {
        $this->id = $id;
        $this->saida = $saida;
        $this->equipamentos = $equipamentos;
        $this->quantidade = $quantidade;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getSaida(): Saida
    {
        return $this->saida;
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
