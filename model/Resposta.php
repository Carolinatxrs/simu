<?php  
/**
 * Created by Carolina Teixeira
 */

	class Resposta{

		private $questao_id_q;
		private $opcoes_id_op;

		public function getQuestao_id_q(){
			return $this->questao_id_q;
		}
		public function setQuestao_id_q($questao_id_q){
			$this->questao_id_q = $questao_id_q;
			return $this;
		}

		public function getOpcoes_id_op(){
			return $this->opcoes_id_op;
		}
		public function setOpcoes_id_op($opcoes_id_op){
			$this->opcoes_id_op = $opcoes_id_op;
			return $this;
		}
	}
?>