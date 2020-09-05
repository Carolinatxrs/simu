<?php
/**
 * Created by Carolina Teixeira
 */
	session_start();
	//apaga as var's.
		unset(	
			$_SESSION['login_admin'],
			$_SESSION['senha_admin']
		);
		$_SESSION['msge'] = "<div class='alert alert-warning' role='alert'>Deslogado com sucesso.</div>";
		header("Location:../view/login_admin.php");
		/*echo("<script>alert('Deslogado com sucesso');	location.href='../view/login_admin.php';</script>");
		session_destroy();
	exit*/
?>