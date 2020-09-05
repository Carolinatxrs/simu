<?php
/**
 * Created by Carolina Teixeira
 */	
	
	class Prova{

		private $id_p;
		private $admin_login_admin;
		private $exame_p;
		private $area_p;
		private $ano_p;
		private $doc_p;
		private $loc_p;

		public function getId_p(){
			return $this->id_p;
		}
		public function setId_p($id_p){
			$this->id_p = $id_p;
			return $this;
		}

		public function getAdmin_login_admin(){
			return $this->admin_login_admin;
		}
		public function setAdmin_login_admin($admin_login_admin){
			$this->admin_login_admin = $admin_login_admin;
			return $this;
		}

		public function getExame_p(){
			return $this->exame_p;
		}
		public function setExame_p($exame_p){
			$this->exame_p = $exame_p;
			return $this;
		}

		public function getArea_p(){
			return $this->area_p;
		}
		public function setArea_p($area_p){
			$this->area_p = $area_p;
			return $this;
		}

		public function getAno_p(){
			return $this->ano_p;
		}
		public function setAno_p($ano_p){
			$this->ano_p = $ano_p;
			return $this;
		}

		public function getDoc_p(){
			return $this->doc_p;
		}
		public function setDoc_p($doc_p){
			$this->doc_p = $doc_p;
			return $this;
		}

		public function getLoc_p(){
			return $this->loc_p;
		}
		public function setLoc_p($loc_p){
			$this->loc_p = $loc_p;
			return $this;
		}
	}
?>