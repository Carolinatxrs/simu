<?php
/**
 * Created by Carolina Teixeira
 */
	
	class Admin{

		private $login_admin;
		private $senha_admin;
		private $conf_senha_admin;
		private $foto_admin;
		private $loc_admin;

		public function getLogin_admin(){
			return $this->login_admin;
		}
		public function setLogin_admin($login_admin){
			$this->login_admin = $login_admin;
			return $this;
		}

		public function getSenha_admin(){
			return $this->senha_admin;
		}
		public function setSenha_admin($senha_admin){
			$this->senha_admin = $senha_admin;
			return $this;
		}

		public function getConf_senha_admin(){
			return $this->conf_senha_admin;
		}
		public function setConf_senha_admin($conf_senha_admin){
			$this->conf_senha_admin = $conf_senha_admin;
			return $this;
		}

		public function getFoto_admin(){
			return $this->foto_admin;
		}
		public function setFoto_admin($foto_admin){
			$this->foto_admin = $foto_admin;
			return $this;
		}

		public function getLoc_admin(){
			return $this->loc_admin;
		}
		public function setLoc_admin($loc_admin){
			$this->loc_admin = $loc_admin;
			return $this;
		}
	}
?>