<?php

require_once __DIR__ . "/../model/Solicitacao.php";
require_once __DIR__ . "/../model/Usuario.php";
require_once __DIR__ . "/../model/ViewSolicitacao";

class SolicitacaoRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function create(Solicitacao $solicitacao): int
    {
        $sql = "INSERT INTO solicitacoes (id_usuario,id_setor,descricao)
                VALUES (:id_usuario, :id_setor, :descricao)";

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(":id_usuario", $solicitacao->getUsuario()->getId());
        $stmt->bindValue(":id_setor", $solicitacao->getSetor()->getId());
        $stmt->bindValue(":descricao", $solicitacao->getDescricao());

        $stmt->execute();

        return intval($this->pdo->lastInsertId());
    }

    public function findById(int $id): ?ViewSolicitacao
    {
        $sql = "SELECT * FROM view_solicitacoes WHERE id = :id";
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if(!$row)
        {
            return null;
        }

        return new ViewSolicitacao($row['id'], $row['data_registro'], $row['setor'], $row['funcionario'], $row['descricao']);
    }

    public function findAll(): array
    {
        $sql = "SELECT * FROM view_solicitacoes";

        $stmt = $this->pdo->query($sql);
        $stmt->execute();

        $solicitacoes = array_map(function ($row)
        {
            $solicitacao = new ViewSolicitacao(
                $row['id'],
                $row['data_registro'],
                $row['setor'],
                $row['funcionario'],
                $row['descricao']
            );
        }, $stmt->fetchAll());

        return $solicitacoes;
    }
    public function update(Solicitacao $solicitacao): bool
    {
        $sql = "UPDATE solicitacoes SET 
                    id_usuario = :id_usuario,
                    situacao = :situacao,
                    descricao = :descricao,
                    data_registro = :data_registro
                WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(":id_usuario", $solicitacao->getUsuario()->getId());
        $stmt->bindValue(":situacao", $solicitacao->getSituacao());
        $stmt->bindValue(":descricao", $solicitacao->getDescricao());
        $stmt->bindValue(":data_registro", $solicitacao->getDataRegistro());
        $stmt->bindValue(":id", $solicitacao->getId());

        return $stmt->execute();
    }

    public function delete(int $id): bool
    {
        $sql = "DELETE FROM solicitacoes WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":id", $id);

        return $stmt->execute();
    }
  
}
