<?php

    class Lanchonete {

        private $id_lanchonete;
        private $nome;
        private $descricao;
        private $cupom;

        public function  __construct($id_lanchonete,$nome,$descricao,$cupom){
        	$this->id_lanchonete = $id_lanchonete;
	        $this->nome = $nome;
	        $this->descricao = $descricao;
	        $this->cupom = $cupom;
        }

        public function setNome($nome){
        	$this->nome = $nome;
        }

        public function getNome(){
        	return $this->nome;
        }

        public function setDescricao($descricao){
        	$this->descricao = $descricao;
        }

        public function getDescricao(){
        	return $this->descricao;
        }

        public function setCupom($cupom){
        	$this->cupom = $cupom;
        }

        public function getCupom(){
        	return $this->cupom;
        }

        public function getId_lanchonete(){
        	return $this->id_lanchonete;
        }

    }

?>