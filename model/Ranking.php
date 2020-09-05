<?php
/**
 * Created by Carolina Teixeira
 */
	class Ranking{

		private $usuario_cpf_user;
		private $ponto_r;

		public function getUsuario_cpf_user(){
			return $this->usuario_cpf_user;
		}
		public function setUsuario_cpf_user($usuario_cpf_user){
			$this->usuario_cpf_user = $usuario_cpf_user;
			return $this;
		}

		public function getPonto_r(){
			return $this->ponto_r;
		}
		public function setPonto_r($ponto_r){
			$this->ponto_r = $ponto_r;
			return $this;
		}
	}
?>