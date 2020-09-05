<?php
/**
 * Created by Carolina Teixeira
 */
	require_once('../model/Usuario.php');
	require_once('Conexao.php');
	
	$conecta = new Conexao();
	$servidor = new Usuario();
	session_start();

	$cpf_user = $_POST['cpf_user'];
	$senha_user = md5($_POST['senha_user']);

	$servidor->setCpf_user($cpf_user);
	$servidor->setSenha_user($senha_user);

	$cpf_user = $servidor->getCpf_user();
	$senha_user = $servidor->getSenha_user();
	
	$result = mysqli_query($conecta->conexao(),"SELECT * FROM usuario WHERE cpf_user='$cpf_user' AND senha_user = '$senha_user';");
	
	if(mysqli_num_rows($result) > 0){
		$dados_servidor = mysqli_fetch_array($result);
		$_SESSION['cpf_user'] = $cpf_user;
		$_SESSION['nome_user'] = $dados_servidor['nome_user'];
		$_SESSION['senha_user'] = $senha_user;
		echo "<script>location.href='../view/menu_user.php';</script>";

	} else {
		unset ($_SESSION['cpf_user']);
		unset ($_SESSION['senha_user']);
		$_SESSION['msge'] = "<div class='alert alert-danger' role='alert'>Usuário ou senha Inválido!</div>";
		header("Location:../index.php");
	}
	
?>