<?php

    class Setor
    {
        private int $id;
        private string $nome;
        private string $descricao;
        private string $telefone;

        public function __construct(int $id, string $nome, string $descricao, string $telefone)
        {
            $this->id = $id;
            $this->nome = $nome;
            $this->descricao = $descricao;
            $this->telefone = $telefone;
        }
        
        /**
         * Get the value of id
         */ 
        public function getId()
        {
            return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
            $this->id = $id;

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
         * Get the value of descricao
         * @return self
         */ 
        public function getDescricao(): string
        {
            return $this->descricao;
        }

        /**
         * Set the value of descricao
         *
         * @return  self
         */ 
        public function setDescricao($descricao)
        {
            $this->descricao = $descricao;

            return $this;
        }

        /**
         * Get the value of telefone
         */ 
        public function getTelefone()
        {
            return $this->telefone;
        }

        /**
         * Set the value of telefone
         *
         * @return  self
         */ 
        public function setTelefone($telefone)
        {   
            $this->telefone = $telefone;

            return $this;
        }
    }