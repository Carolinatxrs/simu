<?php
/**
 * Created by Carolina Teixeira
 */

	require_once ('Conexao.php');

	/*USUÁRIOS*/

	function atualizarSenha($cpf_user, $senha_user, $conf_senha_user){
		$con = new Conexao();
		$sql = "UPDATE usuario SET senha_user = '$senha_user', conf_senha_user = '$conf_senha_user' WHERE cpf_user = '$cpf_user'";
		$resultado = mysqli_query($con->conexao(),$sql);
		
		return $resultado;
	}

	function atualizarUsuario($cpf_user, $nome_user, $sobrenome_user, $sexo_user, $instituto_user, $cidade_user, $uf_user, $senha_user, $conf_senha_user, $foto_user, $loc_user){
		$con = new Conexao();
		$sql = "UPDATE usuario SET	nome_user = '$nome_user', sobrenome_user = '$sobrenome_user', sexo_user = '$sexo_user', instituto_user = '$instituto_user', cidade_user = '$cidade_user', uf_user = '$uf_user', senha_user = '$senha_user', conf_senha_user = '$conf_senha_user', foto_user = '$foto_user', loc_user = '$loc_user' WHERE cpf_user = '$cpf_user'";
		$result = mysqli_query($con->conexao(),$sql);
		
		return $result;
	}

	/*ADMINISTRADOR*/

	function atualizarAdmin($login_admin, $senha_admin, $conf_senha_admin, $foto_admin, $loc_admin){
		$con = new Conexao();
		$sql = "UPDATE admin SET senha_admin = '$senha_admin', conf_senha_admin = '$conf_senha_admin', foto_admin = '$foto_admin', loc_admin = '$loc_admin' WHERE login_admin = '$login_admin'";
		$resultado = mysqli_query($con->conexao(),$sql);
		
		return $resultado;
	}

	/*QUESTÃO*/

	function atualizarQuestao($cod_q, $perg_q){
		$con = new Conexao();
		$sql = "UPDATE questao SET perg_q = '$perg_q' WHERE id_q = '$cod_q'";
		$resq = mysqli_query($con->conexao(),$sql);
		
		return $resq;
	}

	/*OPÇÕES*/

	function atualizarOpcao($questao_id_q, $op_op, $ordem_op){
		$con = new Conexao();
		$sql = "UPDATE opcoes SET op_op = '$op_op' WHERE questao_id_q = '$questao_id_q'  AND ordem_op = '$ordem_op'";
		$resq = mysqli_query($con->conexao(),$sql);
		
		return $resq;
	}

	/*HISTORICO*/

	function atualizarHistoricoAc($qtd_q, $qt_ac, $ponto_acum_his, $id_his, $usuario_cpf_user){
		$con = new Conexao();
		$sql = "UPDATE historico SET qtd_q_his = '$qtd_q', qtd_ac_his = '$qt_ac', ponto_his = '$ponto_acum_his' WHERE id_his = '$id_his' AND usuario_cpf_user = '$usuario_cpf_user'";
		$resultadoh = mysqli_query($con->conexao(),$sql);
		
		return $resultadoh;
	}

	function atualizarHistoricoEr($qtd_q, $qt_er, $id_his, $usuario_cpf_user){
		$con = new Conexao();
		$sql = "UPDATE historico SET qtd_q_his = '$qtd_q', qtd_er_his = '$qt_er' WHERE id_his = '$id_his' AND usuario_cpf_user = '$usuario_cpf_user'";
		$resultadohis = mysqli_query($con->conexao(),$sql);
		
		return $resultadohis;
	}

	/*RANKING*/

	function atualizarRanking($ponto_rank, $usuario_cpf_user){
		$con = new Conexao();
		$sql_r = "UPDATE ranking SET ponto_r = '$ponto_rank' WHERE usuario_cpf_user = '$usuario_cpf_user'";
		$resultrank = mysqli_query($con->conexao(),$sql_r);
		
		return $resultrank;
	}

?>