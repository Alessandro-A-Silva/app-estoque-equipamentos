<?php

require_once __DIR__ . "/../model/Usuario.php";
require_once __DIR__ . "/../util/NivelAcesso.php";

class UsuarioRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function create(Usuario $u): int
    {
        $sql = "INSERT INTO usuarios 
                (id_funcionario, nome, senha, nivel_acesso, ativo) 
                VALUES 
                (:id_funcionario, :nome, :senha, :nivel_acesso, :ativo)";

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(":id_funcionario", $u->getIdFuncionario());
        $stmt->bindValue(":nome", $u->getNome());
        $stmt->bindValue(":senha", $u->getSenha());
        $stmt->bindValue(":nivel_acesso", $u->getNivelAcesso()->value);
        $stmt->bindValue(":ativo", $u->getAtivo(), PDO::PARAM_BOOL);

        $stmt->execute();
        return $this->pdo->lastInsertId();
    }

    public function findById(int $id): ?Usuario
    {
        $sql = "SELECT * FROM usuarios WHERE id = :id LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        return new Usuario(
            $row["id"],
            $row["id_funcionario"],
            $row["nome"],
            $row["senha"],
            NivelAcesso::from($row["nivel_acesso"]),
            boolval($row["ativo"])
        );
    }

    public function findAll(): array
    {
        $sql = "SELECT * FROM usuarios";
        $stmt = $this->pdo->query($sql);

        $lista = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $lista[] = new Usuario(
                $row["id"],
                $row["id_funcionario"],
                $row["nome"],
                $row["senha"],
                NivelAcesso::from($row["nivel_acesso"]),
                boolval($row["ativo"])
            );
        }

        return $lista;
    }

    public function update(Usuario $u): bool
    {
        $sql = "UPDATE usuarios SET 
                    id_funcionario = :id_funcionario,
                    nome = :nome,
                    senha = :senha,
                    nivel_acesso = :nivel_acesso,
                    ativo = :ativo
                WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(":id", $u->getId());
        $stmt->bindValue(":id_funcionario", $u->getIdFuncionario());
        $stmt->bindValue(":nome", $u->getNome());
        $stmt->bindValue(":senha", $u->getSenha());
        $stmt->bindValue(":nivel_acesso", $u->getNivelAcesso()->value);
        $stmt->bindValue(":ativo", $u->getAtivo(), PDO::PARAM_BOOL);

        return $stmt->execute();
    }

    public function delete(int $id): bool
    {
        $sql = "DELETE FROM usuarios WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":id", $id);
        return $stmt->execute();
    }
}
