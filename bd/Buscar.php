<?php
/**
 * Created by Carolina Teixeira
 */

	require_once ('Conexao.php');

	/*USUÁRIOS*/

	function buscarCpfUsuario($cpf_user, $dt_nasc_user){
		$con = new Conexao();

		$sql = "SELECT * FROM usuario WHERE cpf_user = '$cpf_user' AND dt_nasc_user = '$dt_nasc_user'";
		$resultado = mysqli_query($con->conexao(),$sql);
		$res = mysqli_fetch_array($resultado);

		return $res;
	}

	function buscarFotoUsuario($cpf_user, $senha_user){
		$con = new Conexao();
		$sql = "SELECT foto_user,loc_user FROM `usuario` WHERE cpf_user = '$cpf_user' AND senha_user = '$senha_user'";
		$resultado = mysqli_query($con->conexao(),$sql);
		$res = mysqli_fetch_array($resultado);
		
		return $res;
	}

	/*ADMINISTRADOR*/

	function buscarFotoAdmin($login_admin){
		$con = new Conexao();
		$sql = "SELECT foto_admin,loc_admin FROM `admin` WHERE login_admin = '$login_admin'";
		$resultado = mysqli_query($con->conexao(),$sql);
		$res = mysqli_fetch_array($resultado);
		
		return $res;
	}

	/*PROVA*/

	function buscarProva($id_p){
		$con = new Conexao();
		$sql = "SELECT doc_p,loc_p FROM `prova` WHERE id_p = '$id_p'";
		$resultado = mysqli_query($con->conexao(),$sql);
		$res = mysqli_fetch_array($resultado);
		
		return $res;
	}

	/*QUESTÃO*/

	function buscarSimuPadEna($exame_q, $area_q, $ano_q){
		$con = new Conexao();
		$sql = "SELECT * FROM questao WHERE exame_q = '$exame_q' AND area_q = '$area_q' AND ano_q = '$ano_q'";
		$resultado = mysqli_query($con->conexao(),$sql);
		
		return $resultado;
	}

	function buscarSimuPadPos($exame_q, $ano_q){
		$con = new Conexao();
		$sql = "SELECT * FROM questao WHERE exame_q = '$exame_q' AND ano_q = '$ano_q'";
		$resultado = mysqli_query($con->conexao(),$sql);
		
		return $resultado;
	}

	function buscarQuestaoDupl($perg_q){
		$con = new Conexao();
		$sqlq = "SELECT COUNT(id_q) AS total FROM questao WHERE perg_q = '$perg_q'";
		$resultadoq = mysqli_query($con->conexao(),$sqlq);

		return $resultadoq;
	}

	function buscarSimuPers($exame_q, $cat_q, $qtd_q){
		$con = new Conexao();
		$sqlper = "SELECT * FROM questao WHERE exame_q = '$exame_q' AND cat_q = '$cat_q' ORDER BY RAND() LIMIT $qtd_q";
		$resulper = mysqli_query($con->conexao(),$sqlper);
		
		return $resulper;
	}

	/*RESPOSTA*/

	function buscarResposta($qid){
		$con = new Conexao();
		$sql = "SELECT * FROM resposta WHERE questao_id_q = '$qid'";
		$resultado = mysqli_query($con->conexao(),$sql);
		$res = mysqli_fetch_array($resultado);
		
		return $res;
	}

	/*HISTORICO*/

	function buscarHistorico($id_his, $usuario_cpf_user){
		$con = new Conexao();
		$sql = "SELECT * FROM historico WHERE id_his='$id_his' AND usuario_cpf_user='$usuario_cpf_user'";
		$resulth = mysqli_query($con->conexao(),$sql);
		$resh = mysqli_fetch_array($resulth);
		
		return $resh;
	}

	/*RANKING*/

	function buscarRank($usuario_cpf_user){
		$con = new Conexao();
		$sql = "SELECT * FROM ranking WHERE usuario_cpf_user = '$usuario_cpf_user'";
		$resultr = mysqli_query($con->conexao(),$sql);
		// $rowcount = mysqli_num_rows($resultr);
		
		return $resultr;
	}
?>