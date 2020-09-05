<?php
/**
 * Created by Carolina Teixeira
 */

	require_once ('Conexao.php');

	/*USUÁRIOS*/

	function removerUsuario($cpf_user, $senha_user){
		$con = new Conexao();
		$sql = "DELETE FROM usuario WHERE cpf_user = '$cpf_user' AND senha_user = '$senha_user'";
		$result = mysqli_query($con->conexao(),$sql);
		
		return $result;
	}

	/*ADMINISTRADOR*/

	function removerAdmin($login_admin){
		$con = new Conexao();
		$sql = "DELETE FROM admin WHERE login_admin = '$login_admin'";
		$result = mysqli_query($con->conexao(),$sql);
		
		return $result;
	}

	/*PROVA*/

	function removerProva($id_p){
		$con = new Conexao();
		$sql = "DELETE FROM prova WHERE id_p = '$id_p'";
		$result = mysqli_query($con->conexao(),$sql);
		
		return $result;
	}

	/*QUESTÃO*/

	function removerQuestao($cod_q){
		$con = new Conexao();
		$sql = "DELETE FROM questao WHERE id_q = '$cod_q'";
		$result = mysqli_query($con->conexao(),$sql);
		
		return $result;
	}

	/*OPÇÕES*/

	function removerOpcoes($cod_q){
		$con = new Conexao();
		$sqlop = "DELETE FROM opcoes WHERE questao_id_q = '$cod_q'";
		$resultop = mysqli_query($con->conexao(),$sqlop);
		
		return $resultop;
	}

	/*RESPOSTA*/

	function removerResposta($cod_q){
		$con = new Conexao();
		$sqlr = "DELETE FROM resposta WHERE questao_id_q = '$cod_q'";
		$resul = mysqli_query($con->conexao(),$sqlr);
		
		return $resul;
	}

	/*HISTORICO*/

	function removerHistorico($cpf_user){
		$con = new Conexao();
		$sqlh = "DELETE FROM historico WHERE usuario_cpf_user = '$cpf_user'";
		$resulth = mysqli_query($con->conexao(),$sqlh);
		
		return $resulth;
	}

	/*RANKING*/

	function removerRanking($cpf_user){
		$con = new Conexao();
		$sqlrk = "DELETE FROM ranking WHERE usuario_cpf_user = '$cpf_user'";
		$resultrk = mysqli_query($con->conexao(),$sqlrk);
		
		return $resultrk;
	}

?>