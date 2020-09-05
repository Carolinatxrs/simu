<?php 
/**
 * Created by Carolina Teixeira
 */
	require_once ('../bd/Conexao.php');

	session_start();
		$_SESSION["cpf_user"] = $_POST['cpf_user'];

	require_once ('../model/Usuario.php');
	require_once ('../bd/Buscar.php');
	
	$usuario = new Usuario();
	
	$cpf_user = $_POST['cpf_user'];
	$data_user = $_POST['dt_nasc_user'];

	/*tratamento para data*/
	$dt_nasc_user = date('d/m/Y',  strtotime($data_user));

	$usuario->setCpf_user($cpf_user);
	$usuario->setDt_nasc_user($dt_nasc_user);

	$cpf_user = $usuario->getCpf_user();
	$dt_nasc_user = $usuario->getDt_nasc_user();

	$resultado = buscarCpfUsuario($cpf_user, $dt_nasc_user);

	if (isset($resultado['cpf_user'])){
		header('location:../view/redefinir_nova_senha.php');
	}else{
		unset($_SESSION['msge']);
		$_SESSION['msge'] = "<div class='alert alert-danger' role='alert'>Ops! Dado(s) incorreto(s).</div>";
		header("Location:../view/redefinir_senha.php");
	}

?>