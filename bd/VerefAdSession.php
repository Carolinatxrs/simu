<?php
/**
 * Created by Carolina Teixeira
 */
	// Inicia sessões
	session_start();
	// Verifica se existe os dados da sessão de login
	if(!isset($_SESSION["login_admin"]) || !isset($_SESSION["senha_admin"]))
	{
		$_SESSION['msge'] = "<div class='alert alert-warning' role='alert'>Administrador não Logado! Login Obrigatório.</div>";
		header("Location:../view/login_admin.php");
	}
	
?>