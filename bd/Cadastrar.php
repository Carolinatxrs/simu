<?php
/**
 * Created by Carolina Teixeira
 */

	require_once ('Conexao.php');

	/*USUÁRIO*/

	function cadastrarUsuario($cpf_user, $nome_user, $sobrenome_user, $sexo_user, $dt_nasc_user, $instituto_user, $cidade_user, $uf_user, $senha_user){
		$con = new Conexao();
		$sql = "INSERT INTO usuario (cpf_user, nome_user, sobrenome_user, sexo_user, dt_nasc_user, instituto_user, cidade_user, uf_user, senha_user) VALUES ('$cpf_user', '$nome_user', '$sobrenome_user', '$sexo_user', '$dt_nasc_user', '$instituto_user', '$cidade_user', '$uf_user', '$senha_user')";
		$resultado = mysqli_query($con->conexao(),$sql);

		return $resultado;
	}

	/*ADMINISTRADOR*/

	function cadastrarAdmin($login_admin, $senha_admin, $conf_senha_admin, $foto_admin, $loc_admin){
		$con = new Conexao();
		$sql = "INSERT INTO admin (login_admin, senha_admin, conf_senha_admin, foto_admin, loc_admin) VALUES ('$login_admin', '$senha_admin', '$conf_senha_admin', '$foto_admin', '$loc_admin')";
		$resultado = mysqli_query($con->conexao(),$sql);

		return $resultado;
	}

	/*PROVA*/

	function cadastrarProva($admin_login_admin, $exame_p, $area_p, $ano_p, $doc_p, $loc_p){
		$con = new Conexao();
		$sql = "INSERT INTO prova (admin_login_admin, exame_p, area_p, ano_p, doc_p, loc_p) VALUES ('$admin_login_admin', '$exame_p', '$area_p', '$ano_p', '$doc_p', '$loc_p')";
		$resultado = mysqli_query($con->conexao(),$sql);

		return $resultado;
	}

	/*QUESTÃO*/

	function cadastrarQuestao($cod_q, $usuario_cpf_user, $exame_q, $area_q, $cat_q, $ano_q, $perg_q){
		$con = new Conexao();
		$sql_q = "INSERT INTO questao (id_q, usuario_cpf_user, exame_q, area_q, cat_q, ano_q, perg_q) VALUES ('$cod_q', '$usuario_cpf_user', '$exame_q', '$area_q', '$cat_q', '$ano_q', '$perg_q')";
		$resq = mysqli_query($con->conexao(),$sql_q);

		return $resq;
	}

	/*OPÇÃO*/

	function cadastrarOpcao($cod_op, $questao_id_q, $op_op, $ordem_op){
		$con = new Conexao();
		$sql_op = "INSERT INTO opcoes (id_op, questao_id_q, op_op, ordem_op) VALUES ('$cod_op', '$questao_id_q', '$op_op', '$ordem_op')";
		$resop = mysqli_query($con->conexao(),$sql_op);

		return $resop;
	}

	/*RESPOSTA*/

	function cadastrarResposta($questao_id_q, $opcoes_id_op){
		$con = new Conexao();
		$sql_r = "INSERT INTO resposta (questao_id_q, opcoes_id_op) VALUES ('$questao_id_q', '$opcoes_id_op')";
		$resu = mysqli_query($con->conexao(),$sql_r);

		return $resu;
	}

	/*HISTORICO*/

	function cadastrarHistorico($id_his, $usuario_cpf_user, $simulado_his, $exame_his, $data_his, $qtd_q_his, $qtd_ac_his, $qtd_er_his, $ponto_his){
		$con = new Conexao();
		$sql_h = "INSERT INTO historico (id_his, usuario_cpf_user, simulado_his, exame_his, data_his, qtd_q_his, qtd_ac_his, qtd_er_his, ponto_his) VALUES ('$id_his', '$usuario_cpf_user', '$simulado_his', '$exame_his', '$data_his', '$qtd_q_his', '$qtd_ac_his', '$qtd_er_his', '$ponto_his')";
		$resulh = mysqli_query($con->conexao(),$sql_h);

		return $resulh;
	}

	/*RANKING*/

	function cadastrarRanking($usuario_cpf_user, $ponto_r){
		$con = new Conexao();
		$sql_rank = "INSERT INTO ranking (usuario_cpf_user, ponto_r) VALUES('$usuario_cpf_user','$ponto_r')";
		$resrank = mysqli_query($con->conexao(),$sql_rank);

		return $resrank;
	}

?>