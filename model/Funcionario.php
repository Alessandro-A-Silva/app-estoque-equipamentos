<?php

    require_once __DIR__ . "/../util/Telefone.php";
    require_once __DIR__ . "/../util/Cpf.php";

    class Funcionario
    {
        private int $id;
        private int $idSetor;
        private string $nome;
        private string $sobrenome;
        private Telefone $telefone;
        private string $numeroMatricula;
        private Cpf $cpf;

        public function __construct(int $id,int $idSetor, string $nome, string $sobrenome, string $telefone, string $numeroMatricula, string $cpf)
        {
            $this->id = $id;
            $this->idSetor = $idSetor;
            $this->nome = $nome;
            $this->sobrenome = $sobrenome;
            $this->telefone = new Telefone($telefone);
            $this->validarNumeroMatricula($numeroMatricula);
            $this->numeroMatricula = $numeroMatricula;
            $this->cpf = new Cpf($cpf);
        }

        private function validarNumeroMatricula($numeroMatricula)
        {
            $numeroMatricula = preg_replace('/[^0-9]/', '', $numeroMatricula);
            if(strlen($numeroMatricula) == 0)
            {
                throw new InvalidArgumentException("Número da matrícula inválido.");
            }
        }

        /**
         * Get the value of id
         */ 
        public function getId()
        {
            return $this->id;
        }
       
        /**
         * Get the value of idSetor
         */ 
        public function getIdSetor()
        {
            return $this->idSetor;
        }

        /**
         * Set the value of idSetor
         *
         * @return  self
         */ 
        public function setIdSetor($idSetor)
        {
            $this->idSetor = $idSetor;

            return $this;
        }

        /**
         * Get the value of nome
         */ 
        public function getNome()
        {
            return $this->nome;
        }

        /**
         * Set the value of nome
         *
         * @return  self
         */ 
        public function setNome($nome)
        {
            $this->nome = $nome;

            return $this;
        }

        /**
         * Get the value of sobrenome
         */ 
        public function getSobrenome()
        {
            return $this->sobrenome;
        }

        /**
         * Set the value of sobrenome
         *
         * @return  self
         */ 
        public function setSobrenome($sobrenome)
        {
            $this->sobrenome = $sobrenome;

            return $this;
        }

        /**
         * Get the value of telefone
         */ 
        public function getTelefone()
        {
            return $this->telefone->getNumero();
        }

         /**
         * Obtem o número do telefone no formato: Telefone móvel (00) 0 0000-0000 ou Telefone fixo (00) 0000-0000
         */ 
        public function getTelefoneFormatado()
        {
            return $this->telefone->getNumeroFormatado();
        }

        /**
         * Set the value of telefone
         *
         * @return  self
         */ 
        public function setTelefone($telefone)
        {
            $this->telefone = new Telefone($telefone);

            return $this;
        }

        /**
         * Get the value of numeroMatricula
         */ 
        public function getNumeroMatricula()
        {
            return $this->numeroMatricula;
        }

        /**
         * Set the value of numeroMatricula
         *
         * @return  self
         */ 
        public function setNumeroMatricula($numeroMatricula)
        {   
            $this->validarNumeroMatricula($numeroMatricula);

            $this->numeroMatricula = $numeroMatricula;

            return $this;
        }

        /**
         * Obtem o número do cpf no formato: 00000000000
         */ 
        public function getCpf()
        {
            return $this->cpf;
        }

        /**
         * Obtem o número do cpf no formato: 000.000.000-00
         */ 
        public function getCpfFormatado()
        {
            return $this->cpf->getNumeroFormatado();
        }
    }