<?php

require_once __DIR__ . "/Solicitacao.php";
require_once __DIR__ . "/Equipamentos.php";

class SolicitacaoEquipamentos
{
    private int $id;
    private Solicitacao $solicitacao;
    private Equipamentos $equipamentos;
    private int $quantidade;

    public function __construct(
        int $id,
        Solicitacao $solicitacao,
        Equipamentos $equipamentos,
        int $quantidade
    ) {
        $this->id = $id;
        $this->solicitacao = $solicitacao;
        $this->equipamentos = $equipamentos;
        $this->quantidade = $quantidade;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getSolicitacao(): Solicitacao
    {
        return $this->solicitacao;
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
