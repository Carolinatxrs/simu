<?php 
/**
 * Created by Carolina Teixeira
 */

	class Questao{

		private $cod_q;
		private $usuario_cpf_user;
		private $exame_q;
		private $area_q;
		private $cat_q;
		private $ano_q;
		private $perg_q;

		public function getCod_q(){
			return $this->cod_q;
		}
		public function setCod_q($cod_q){
			$this->cod_q = $cod_q;
			return $this;
		}

		public function getUsuario_cpf_user(){
			return $this->usuario_cpf_user;
		}
		public function setUsuario_cpf_user($usuario_cpf_user){
			$this->usuario_cpf_user = $usuario_cpf_user;
			return $this;
		}

		public function getExame_q(){
			return $this->exame_q;
		}
		public function setExame_q($exame_q){
			$this->exame_q = $exame_q;
			return $this;
		}

		public function getArea_q(){
			return $this->area_q;
		}
		public function setArea_q($area_q){
			$this->area_q = $area_q;
			return $this;
		}

		public function getCat_q(){
			return $this->cat_q;
		}
		public function setCat_q($cat_q){
			$this->cat_q = $cat_q;
			return $this;
		}

		public function getAno_q(){
			return $this->ano_q;
		}
		public function setAno_q($ano_q){
			$this->ano_q = $ano_q;
			return $this;
		}

		public function getPerg_q(){
			return $this->perg_q;
		}
		public function setPerg_q($perg_q){
			$this->perg_q = $perg_q;
			return $this;
		}
	}
?>