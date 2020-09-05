<?php 
/**
 * Created by Carolina Teixeira
 */
	require_once ('../bd/Conexao.php');
	require_once ('../model/Usuario.php');
	require_once ('../bd/Buscar.php');
	require_once ('../bd/Remover.php');
	session_start();

	if ($_GET['s'] == 0) {
		$usuario = new Usuario();
		/*pega os dados do usuário logado com a session*/
		$cpf_user = $_SESSION["cpf_user"];
		$senha_user = $_SESSION["senha_user"];	

		$usuario->setCpf_user($cpf_user);
		$usuario->setSenha_user($senha_user);

		$cpf_user = $usuario->getCpf_user();
		$senha_user = $usuario->getSenha_user();

		/*busca a foto do usuário*/
		$resultado = buscarFotoUsuario($cpf_user, $senha_user);
		$tmp = $resultado['foto_user'];
		$loc_user = $resultado['loc_user'];
		$img	=	utf8_decode($tmp);	//tratamento para os benditos acentos

		/*chama função para remover usuario*/
		$result = removerUsuario($cpf_user, $senha_user);
		if($result == 1){
		//verifica se a foto existe no servidor e apaga
			if(file_exists($loc_user.$img) && $img != "")	$del = unlink($loc_user.$img);
			/*função para remover historico e o rank do user*/
			$resulth = removerHistorico($cpf_user);
			$resultrk = removerRanking($cpf_user);
			unset($_SESSION['msgc']);
			$_SESSION['msgc'] = "<div class='alert alert-success' role='alert'>Conta removida com sucesso!</div>";
		header("Location:../index.php");
		}else{
			unset($_SESSION['msge']);
			$_SESSION['msge'] = "<div class='alert alert-danger' role='alert'>Ops! Conta não foi removida.</div>";
		header("Location:../view/menu_user.php");
		}
	}else{
		$usuario = new Usuario();

		$cpf_user = $_GET["idu"];
		$senha_user = $_GET["p"];

		$usuario->setCpf_user($cpf_user);
		$usuario->setSenha_user($senha_user);

		$cpf_user = $usuario->getCpf_user();
		$senha_user = $usuario->getSenha_user();

		/*busca a foto do usuário*/
		$resultado = buscarFotoUsuario($cpf_user, $senha_user);
		$tmp = $resultado['foto_user'];
		$loc_user = $resultado['loc_user'];
		$img	=	utf8_decode($tmp);	//tratamento para os acentos

		/*chama função para remover usuario*/
		$result = removerUsuario($cpf_user, $senha_user);
		if($result == 1){
		//verifica se a foto existe no servidor e apaga
			if(file_exists($loc_user.$img) && $img != "")	$del = unlink($loc_user.$img);
			/*função para remover historico e o rank do user*/
			$resulth = removerHistorico($cpf_user);
			$resultrk = removerRanking($cpf_user);
			unset($_SESSION['msg']);
			$_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Usuário removido com sucesso!</div>";
		header("Location:../view/listar_usuarios.php");
		}else{
			unset($_SESSION['msger']);
			$_SESSION['msger'] = "<div class='alert alert-danger' role='alert'>Ops! Não foi possível remover usuário.</div>";
		header("Location:../view/listar_usuarios.php");
		}
	}
?>