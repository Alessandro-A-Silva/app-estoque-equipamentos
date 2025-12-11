<?php

require_once __DIR__ . "/../model/Solicitacao.php";
require_once __DIR__ . "/../model/Usuario.php";

class SolicitacaoRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function create(Solicitacao $solicitacao): int
    {
        $sql = "INSERT INTO solicitacoes (id_usuario, situacao, descricao, data_registro)
                VALUES (:id_usuario, :situacao, :descricao, :data_registro)";

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(":id_usuario", $solicitacao->getUsuario()->getId());
        $stmt->bindValue(":situacao", $solicitacao->getSituacao());
        $stmt->bindValue(":descricao", $solicitacao->getDescricao());
        $stmt->bindValue(":data_registro", $solicitacao->getDataRegistro());

        $stmt->execute();

        return intval($this->pdo->lastInsertId());
    }

    public function getById(int $id): ?Solicitacao
    {
        $sql = "SELECT * FROM solicitacoes WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }
        $usuario = $this->loadUsuario($row["id_usuario"]);

        return new Solicitacao(
            $row["id"],
            $usuario,
            $row["situacao"],
            $row["descricao"],
            $row["data_registro"]
        );
    }

    public function getAll(): array
    {
        $sql = "SELECT * FROM solicitacoes";
        $stmt = $this->pdo->query($sql);

        $lista = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $usuario = $this->loadUsuario($row["id_usuario"]);

            $lista[] = new Solicitacao(
                $row["id"],
                $usuario,
                $row["situacao"],
                $row["descricao"],
                $row["data_registro"]
            );
        }

        return $lista;
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

    private function loadUsuario(int $idUsuario): Usuario
    {


        $sql = "SELECT * FROM usuarios WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":id", $idUsuario);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return new Usuario(
            $row["id"],
            $row["nome"],
            $row["email"],
            $row["senha"] 
        );
    }
}
