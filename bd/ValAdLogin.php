<?php
/**
 * Created by Carolina Teixeira
 */
	require_once('../model/Admin.php');
	require_once('Conexao.php');
	
	$conecta = new Conexao();
	$servidor = new Admin();
	session_start();

	$login_admin = $_POST['login_admin'];
	$senha_admin = md5($_POST['senha_admin']);

	$servidor->setLogin_admin($login_admin);
	$servidor->setSenha_admin($senha_admin);

	$login_admin = $servidor->getLogin_admin();
	$senha_admin = $servidor->getSenha_admin();
	
	$result = mysqli_query($conecta->conexao(),"SELECT * FROM admin WHERE login_admin='$login_admin' AND senha_admin = '$senha_admin';");
	
	if(mysqli_num_rows($result) > 0){
		$dados_servidor = mysqli_fetch_array($result);
		$_SESSION['login_admin'] = $login_admin;
		$_SESSION['senha_admin'] = $senha_admin;
		echo "<script>location.href='../view/menu_admin.php';</script>";

	} else {
		unset ($_SESSION['login_admin']);
		unset ($_SESSION['senha_admin']);
		$_SESSION['msge'] = "<div class='alert alert-danger' role='alert'>Usuário ou senha Inválido!</div>";
		header("Location:../view/login_admin.php");
	}
	
?>