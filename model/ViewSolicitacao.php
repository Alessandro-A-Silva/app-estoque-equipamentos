<?php

    class ViewSolicitacao
    {
        private int $id;
        private string $dataRegistro;
        private string $setor;
        private string $funcionario;
        private string $descricao;

        public function __construct(int $id, string $dataRegistro, string $setor, string $funcionario, string $descricao)
        {
            $this->id = $id;
            $this->dataRegistro = $dataRegistro;
            $this->setor = $setor;
            $this->funcionario = $funcionario;
            $this->descricao = $descricao;
        }

        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Get the value of dataRegistro
         */ 
        public function getDataRegistro()
        {
                return $this->dataRegistro;
        }

        /**
         * Get the value of setor
         */ 
        public function getSetor()
        {
                return $this->setor;
        }

        /**
         * Get the value of funcionario
         */ 
        public function getFuncionario()
        {
                return $this->funcionario;
        }

        /**
         * Get the value of descricao
         */ 
        public function getDescricao()
        {
                return $this->descricao;
        }
    }