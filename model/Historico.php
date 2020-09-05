<?php 
/**
 * Created by Carolina Teixeira
 */

	class Historico{
		
		private $id_his;
		private $usuario_cpf_user;
		private $simulado_his;
		private $exame_his;
		private $data_his;
		private $qtd_q_his;
		private $qtd_ac_his;
		private $qtd_er_his;
		private $ponto_his;

		public function getId_his(){
			return $this->id_his;
		}
		public function setId_his($id_his){
			$this->id_his = $id_his;
			return $this;
		}

		public function getUsuario_cpf_user(){
			return $this->usuario_cpf_user;
		}
		public function setUsuario_cpf_user($usuario_cpf_user){
			$this->usuario_cpf_user = $usuario_cpf_user;
			return $this;
		}

		public function getSimulado_his(){
			return $this->simulado_his;
		}
		public function setSimulado_his($simulado_his){
			$this->simulado_his = $simulado_his;
			return $this;
		}

		public function getExame_his(){
			return $this->exame_his;
		}
		public function setExame_his($exame_his){
			$this->exame_his = $exame_his;
			return $this;
		}

		public function getData_his(){
			return $this->data_his;
		}
		public function setData_his($data_his){
			$this->data_his = $data_his;
			return $this;
		}

		public function getQtd_q_his(){
			return $this->qtd_q_his;
		}
		public function setQtd_q_his($qtd_q_his){
			$this->qtd_q_his = $qtd_q_his;
			return $this;
		}

		public function getQtd_ac_his(){
			return $this->qtd_ac_his;
		}
		public function setQtd_ac_his($qtd_ac_his){
			$this->qtd_ac_his = $qtd_ac_his;
			return $this;
		}

		public function getQtd_er_his(){
			return $this->qtd_er_his;
		}
		public function setQtd_er_his($qtd_er_his){
			$this->qtd_er_his = $qtd_er_his;
			return $this;
		}

		public function getPonto_his(){
			return $this->ponto_his;
		}
		public function setPonto_his($ponto_his){
			$this->ponto_his = $ponto_his;
			return $this;
		}
	}
?>