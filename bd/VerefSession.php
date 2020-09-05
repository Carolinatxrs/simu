<?php
/**
 * Created by Carolina Teixeira
 */
	// Inicia sessões
	session_start();
	// Verifica se existe os dados da sessão de login
	if(!isset($_SESSION["cpf_user"]) || !isset($_SESSION["senha_user"]))
	{
		$_SESSION['msge'] = "<div class='alert alert-warning' role='alert'>Usuário não Logado! Login Obrigatório.</div>";
		header("Location:../index.php");
	}
	
?>