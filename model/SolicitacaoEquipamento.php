<?php

require_once __DIR__ . "/Solicitacao.php";
require_once __DIR__ . "/Equipamento.php";

class SolicitacaoEquipamento
{
    private int $id;
    private Solicitacao $solicitacao;
    private Equipamento $equipamento;
    private int $quantidade;

    public function __construct(
        int $id,
        Solicitacao $solicitacao,
        Equipamento $equipamento,
        int $quantidade
    ) {
        $this->id = $id;
        $this->solicitacao = $solicitacao;
        $this->equipamento = $equipamento;
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

    public function getEquipamentos(): Equipamento
    {
        return $this->equipamento;
    }

    public function getQuantidade(): int
    {
        return $this->quantidade;
    }
}
