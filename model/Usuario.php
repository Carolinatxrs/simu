<?php
/**
 * Created by Carolina Teixeira
 */
	
	class Usuario{

		private $cpf_user;
		private $nome_user;
		private $sobrenome_user;
		private $sexo_user;
		private $dt_nasc_user;
		private $instituto_user;
		private $cidade_user;
		private $uf_user;
		private $senha_user;
		private $conf_senha_user;
		private $foto_user;
		private $loc_user;


		public function getCpf_user(){
			return $this->cpf_user;
		}
		public function setCpf_user($cpf_user){
			$this->cpf_user = $cpf_user;
			return $this;
		}

		public function getNome_user(){
			return $this->nome_user;
		}
		public function setNome_user($nome_user){
			$this->nome_user = $nome_user;
			return $this;
		}

		public function getSobrenome_user(){
			return $this->sobrenome_user;
		}
		public function setSobrenome_user($sobrenome_user){
			$this->sobrenome_user = $sobrenome_user;
			return $this;
		}

		public function getSexo_user(){
			return $this->sexo_user;
		}
		public function setSexo_user($sexo_user){
			$this->sexo_user = $sexo_user;
			return $this;
		}

		public function getDt_nasc_user(){
			return $this->dt_nasc_user;
		}
		public function setDt_nasc_user($dt_nasc_user){
			$this->dt_nasc_user = $dt_nasc_user;
			return $this;
		}

		public function getInstituto_user(){
			return $this->instituto_user;
		}
		public function setInstituto_user($instituto_user){
			$this->instituto_user = $instituto_user;
			return $this;
		}

		public function getCidade_user(){
			return $this->cidade_user;
		}
		public function setCidade_user($cidade_user){
			$this->cidade_user = $cidade_user;
			return $this;
		}

		public function getUf_user(){
			return $this->uf_user;
		}
		public function setUf_user($uf_user){
			$this->uf_user = $uf_user;
			return $this;
		}

		public function getSenha_user(){
			return $this->senha_user;
		}
		public function setSenha_user($senha_user){
			$this->senha_user = $senha_user;
			return $this;
		}

		public function getConf_senha_user(){
			return $this->conf_senha_user;
		}
		public function setConf_senha_user($conf_senha_user){
			$this->conf_senha_user = $conf_senha_user;
			return $this;
		}

		public function getFoto_user(){
			return $this->foto_user;
		}
		public function setFoto_user($foto_user){
			$this->foto_user = $foto_user;
			return $this;
		}

		public function getLoc_user(){
			return $this->loc_user;
		}
		public function setLoc_user($loc_user){
			$this->loc_user = $loc_user;
			return $this;
		}
	}
?>