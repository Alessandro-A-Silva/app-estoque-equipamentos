<?php
    
    require_once __DIR__ ."/../util/NivelAcesso.php";

    class ViewUsuario
    {
        private int $id;
        private string $setor;
        private string $usuario;
        private NivelAcesso $nivelAcesso;
        private bool $ativo;
        private string $funcionario;
        private string $numeroMatricula;

        public function __construct(
            int $id, 
            string $setor, 
            string $usuario, 
            NivelAcesso $nivelAcesso,
            bool $ativo, 
            string $funcionario, 
            string $numeroMatricula
        )
        {
            $this->id = $id;
            $this->setor = $setor;
            $this->usuario = $usuario;
            $this->nivelAcesso = $nivelAcesso;
            $this->ativo = $ativo;
            $this->funcionario = $funcionario;
            $this->numeroMatricula = $numeroMatricula;
        }

        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Get the value of setor
         */ 
        public function getSetor()
        {
                return $this->setor;
        }

        /**
         * Get the value of usuario
         */ 
        public function getUsuario()
        {
                return $this->usuario;
        }

        /**
         * Get the value of nivelAcesso
         */ 
        public function getNivelAcesso()
        {
                return $this->nivelAcesso;
        }

        /**
         * Get the value of ativo
         */ 
        public function getAtivo()
        {
                return $this->ativo;
        }

        /**
         * Get the value of funcionario
         */ 
        public function getFuncionario()
        {
                return $this->funcionario;
        }

        /**
         * Get the value of numeroMatricula
         */ 
        public function getNumeroMatricula()
        {
                return $this->numeroMatricula;
        }
    }