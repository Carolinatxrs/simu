<?php   
/**
 * Created by Carolina Teixeira
 */

	class Opcoes{

		private $cod_op;
		private $questao_id_q;
		private $op_op;
		private $ordem_op;

		public function getCod_op(){
			return $this->cod_op;
		}
		public function setCod_op($cod_op){
			$this->cod_op = $cod_op;
			return $this;
		}

		public function getQuestao_id_q(){
			return $this->questao_id_q;
		}
		public function setQuestao_id_q($questao_id_q){
			$this->questao_id_q = $questao_id_q;
			return $this;
		}

		public function getOp_op(){
			return $this->op_op;
		}
		public function setOp_op($op_op){
			$this->op_op = $op_op;
			return $this;
		}

		public function getOrdem_op(){
			return $this->ordem_op;
		}
		public function setOrdem_op($ordem_op){
			$this->ordem_op = $ordem_op;
			return $this;
		}
	}
?>