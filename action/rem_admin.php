<?php 
/**
 * Created by Carolina Teixeira
 */
	require_once ('../bd/Conexao.php');
	require_once ('../model/Admin.php');
	require_once ('../bd/Buscar.php');
	require_once ('../bd/Remover.php');
	session_start();

	$admin = new Admin();

	$login_admin = $_SESSION["login_admin"]; /*pega o login do admin logado com a session*/

	$admin->setLogin_admin($login_admin);

	$login_admin = $admin->getLogin_admin();

	/*busca a foto do admin*/
	$resultado = buscarFotoAdmin($login_admin);
	$tmp = $resultado['foto_admin'];
	$loc_admin = $resultado['loc_admin'];
	$img	=	utf8_decode($tmp);	//tratamento para os acentos

	/*chama função para remover admin*/
	$result = removerAdmin($login_admin);
	if($result == 1){
		//verifica se a foto existe no servidor e apaga
		if(file_exists($loc_admin.$img) && $img != "")	$del = unlink($loc_admin.$img);
		unset($_SESSION['msgc']);
		$_SESSION['msgc'] = "<div class='alert alert-success' role='alert'>Conta removida com sucesso!</div>";
		header("Location:../view/login_admin.php");
	}else{
		unset($_SESSION['msge']);
		$_SESSION['msge'] = "<div class='alert alert-danger' role='alert'>Ops! Conta não foi removida.</div>";
		header("Location:../view/menu_admin.php");
	}

?>