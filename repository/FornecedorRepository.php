<?php

    require_once __DIR__ ."/../model/Fornecedor.php";

    class FornecedorRepository
    {   
        private PDO $pdo;
        public function __construct(PDO $pdo)
        {
            $this->pdo = $pdo;
        }
        
        public function create(Fornecedor $fornecedor)
        {
            $sql = "insert into fornecedores (nome_fantasia, razao_social, cnpj) values (:nome_fantasia, :razao_social, :cnpj)";

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindvalue(":nome_fantasia",$fornecedor->getNomeFantasia(),PDO::PARAM_STR);
            $stmt->bindvalue(":razao_social",$fornecedor->getRazaoSocial(),PDO::PARAM_STR);
            $stmt->bindvalue(":cnpj",$fornecedor->getCnpj()->getNumero(),PDO::PARAM_STR);
            
            if(!$stmt->execute())
            {
                throw new Exception("Falha ao registrar fornecedor.");
            }
            
            return (int)$this->pdo->lestInsertId();
        } 

    }