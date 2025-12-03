<?php

    require_once __DIR__ ."/../util/NivelAcesso.php";

    class Usuario
    {
        private int $id;
        private int $idFuncionario;
        private string $nome;
        private string $senha;
        private NivelAcesso $nivelAcesso;
        private bool $ativo;

        public function __construct(int $id, int $idFuncionario, string $nome, string $senha, NivelAcesso $nivelAcesso, bool $ativo)
        {
            $this->id = $id;
            $this->idFuncionario = $idFuncionario;
            $this->nome = $nome;
            $this->$senha = $senha;
            $this->ativo = $ativo;
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
         * Get the value of idFuncionario
         */ 
        public function getIdFuncionario()
        {
                return $this->idFuncionario;
        }

        /**
         * Set the value of idFuncionario
         *
         * @return  self
         */ 
        public function setIdFuncionario($idFuncionario)
        {
                $this->idFuncionario = $idFuncionario;

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
         * Get the value of senha
         */ 
        public function getSenha()
        {
                return $this->senha;
        }

        /**
         * Set the value of senha
         *
         * @return  self
         */ 
        public function setSenha($senha)
        {
                $this->senha = $senha;

                return $this;
        }

        /**
         * Get the value of nivelAcesso
         */ 
        public function getNivelAcesso()
        {
                return $this->nivelAcesso;
        }

        /**
         * Set the value of nivelAcesso
         *
         * @return  self
         */ 
        public function setNivelAcesso($nivelAcesso)
        {
                $this->nivelAcesso = $nivelAcesso;

                return $this;
        }

        /**
         * Get the value of ativo
         */ 
        public function getAtivo()
        {
                return $this->ativo;
        }

        /**
         * Set the value of ativo
         *
         * @return  self
         */ 
        public function setAtivo($ativo)
        {
                $this->ativo = $ativo;

                return $this;
        }
    }