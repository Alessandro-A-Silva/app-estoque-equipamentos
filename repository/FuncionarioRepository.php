<?php

require_once __DIR__ . "/../model/Funcionario.php";
require_once __DIR__ . "/../util/Telefone.php";
require_once __DIR__ . "/../util/Cpf.php";

class FuncionarioRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Insere um funcionário
     */
    public function create(Funcionario $f): int
    {
        $sql = "INSERT INTO funcionarios 
                (id_setor, nome, sobrenome, telefone, numero_matricula, cpf)
                VALUES 
                (:id_setor, :nome, :sobrenome, :telefone, :numero_matricula, :cpf)";

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(":id_setor", $f->getIdSetor());
        $stmt->bindValue(":nome", $f->getNome());
        $stmt->bindValue(":sobrenome", $f->getSobrenome());
        $stmt->bindValue(":telefone", $f->getTelefone());  
        $stmt->bindValue(":numero_matricula", $f->getNumeroMatricula());
        $stmt->bindValue(":cpf", $f->getCpf()->getNumero());

        $stmt->execute();

        return $this->pdo->lastInsertId();
    }

    /**
     * Encontra funcionário pelo ID
     */
    public function findById(int $id): ?Funcionario
    {
        $sql = "SELECT * FROM funcionarios WHERE id = :id LIMIT 1";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(":id", $id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        return new Funcionario(
            $row["id"],
            $row["id_setor"],
            $row["nome"],
            $row["sobrenome"],
            $row["telefone"],
            $row["numero_matricula"],
            $row["cpf"]
        );
    }

    /**
     * Retorna todos os funcionários
     */
    public function findAll(): array
    {
        $sql = "SELECT * FROM funcionarios";
        $stmt = $this->pdo->query($sql);

        $lista = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $lista[] = new Funcionario(
                $row["id"],
                $row["id_setor"],
                $row["nome"],
                $row["sobrenome"],
                $row["telefone"],
                $row["numero_matricula"],
                $row["cpf"]
            );
        }

        return $lista;
    }

    /**
     * Atualiza um funcionário
     */
    public function update(Funcionario $f): bool
    {
        $sql = "UPDATE funcionarios SET 
                    id_setor = :id_setor,
                    nome = :nome,
                    sobrenome = :sobrenome,
                    telefone = :telefone,
                    numero_matricula = :numero_matricula,
                    cpf = :cpf
                WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(":id", $f->getId());
        $stmt->bindValue(":id_setor", $f->getIdSetor());
        $stmt->bindValue(":nome", $f->getNome());
        $stmt->bindValue(":sobrenome", $f->getSobrenome());
        $stmt->bindValue(":telefone", $f->getTelefone());
        $stmt->bindValue(":numero_matricula", $f->getNumeroMatricula());
        $stmt->bindValue(":cpf", $f->getCpf()->getNumero());

        return $stmt->execute();
    }

    /**
     * Exclui um funcionário
     */
    public function delete(int $id): bool
    {
        $sql = "DELETE FROM funcionarios WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":id", $id);

        return $stmt->execute();
    }
}
