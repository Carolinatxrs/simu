<?php
	session_start();
	//apaga as var's.
		unset(	
			$_SESSION['cpf_user'],
			$_SESSION['nome_user'],
			$_SESSION['senha_user']
		);
		$_SESSION['msge'] = "<div class='alert alert-warning' role='alert'>Deslogado com sucesso.</div>";
		header("Location:../index.php");
		/*echo("<script>alert('Deslogado com sucesso');	location.href='../index.php';</script>");
		session_destroy();
	exit*/
?>