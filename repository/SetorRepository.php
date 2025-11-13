<?php

    require_once __DIR__ ."/../model/Setor.php";

    class SetorRepository
    {   
        private PDO $pdo;
        public function __construct(PDO $pdo)
        {
            $this->pdo = $pdo;
        }

        public function create(Setor $setor): int
        {
            $sql = "insert into setores (nome, descricao, telefone) values (:nome, :descricao, :telefone)";

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(":nome",$setor->getNome(),PDO::PARAM_STR);
            $stmt->bindValue(":descricao",$setor->getDescricao(),PDO::PARAM_STR);
            $stmt->bindValue(":telefone", $setor->getTelefone(),PDO::PARAM_STR);
            $stmt->execute();

            if(!$stmt->execute())
            {
                throw new Exception("Falha ao registrar setor.");
            }

            return (int)$this->pdo->lastInsertId();
        }

        public function findById(int $id): ?Setor
        {
            $sql = "select * from setores where id = :id";

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':id',$id, PDO::PARAM_INT);
            $stmt->execute();

            $row = $stmt->fetch();

            if(!$row)
            {
                return null;
            }

            return new Setor($row['id'], $row['nome'], $row['descricao'],$row['telefone']);
        }

        public function findAll()
        {
            $sql = "select * from setores";
            
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            $setores = array_map(function($row) 
            {
                $setor = new Setor(
                    $row['id'], 
                    $row['nome'], 
                    $row['descricao'],
                    $row['telefone']
                );
            },$stmt->fetchAll());
            
            return $setores;
        }

        public function update(Setor $setor): bool
        {
            $sql = "update setores set nome = :nome, descricao = :descricao, telefone = :telefone where id = :id";

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(":id",$setor->getId(), PDO::PARAM_INT);
            $stmt->bindValue(":nome",$setor->getNome(),PDO::PARAM_STR);
            $stmt->bindValue(":descricao",$setor->getDescricao(),PDO::PARAM_STR);
            $stmt->bindValue(":telefone", $setor->getTelefone(),PDO::PARAM_STR);
            
            if(!$stmt->execute())
            {
                throw new Exception("Falha ao atualizar setor.");
            }

            return true;
        }
    }