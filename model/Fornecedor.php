<?php 
    require_once __DIR__ . "/../util/Cnpj.php";
    class Fornecedor
    {
        private int $id;
        private string $nomeFantasia;
        private string $razaoSocial;
        private Cnpj $cnpj;
    
        public function __construct(int $id, string $nomeFantasia, string $razaoSocial, string $cnpj)
        {
            $this->id = $id;
            $this->nomeFantasia = $nomeFantasia;
            $this->razaoSocial = $razaoSocial;
            $this->cnpj = new Cnpj($cnpj);
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
        public function setId(int $id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of nomeFantasia
         */ 
        public function getNomeFantasia()
        {
                return $this->nomeFantasia;
        }

        /**
         * Set the value of nomeFantasia
         *
         * @return  self
         */ 
        public function setNomeFantasia(string $nomeFantasia)
        {
                $this->nomeFantasia = $nomeFantasia;

                return $this;
        }

        /**
         * Get the value of razaoSocial
         */ 
        public function getRazaoSocial()
        {
                return $this->razaoSocial;
        }

        /**
         * Set the value of razaoSocial
         *
         * @return  self
         */ 
        public function setRazaoSocial(string $razaoSocial)
        {
                $this->razaoSocial = $razaoSocial;

                return $this;
        }

        /**
         * Get the value of cnpj
         */ 
        public function getCnpj()
        {
                return $this->cnpj;
        }

        /**
         * Set the value of cnpj
         *
         * @return  self
         */ 
        public function setCnpj(string $cnpj)
        {
                $this->cnpj = new Cnpj($cnpj);

                return $this;
        }
    }

