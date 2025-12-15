<?php

require_once __DIR__ . "/Saida.php";
require_once __DIR__ . "/Equipamento.php";

class SaidaEquipamento
{
    private int $id;
    private Saida $saida;
    private Equipamento $equipamento;
    private int $quantidade;

    public function __construct(
        int $id,
        Saida $saida,
        Equipamento $equipamento,
        int $quantidade
    ) {
        $this->id = $id;
        $this->saida = $saida;
        $this->equipamento = $equipamento;
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

    public function getEquipamentos(): Equipamento
    {
        return $this->equipamento;
    }

    public function getQuantidade(): int
    {
        return $this->quantidade;
    }
}
