<?php 
/**
 * Created by Carolina Teixeira
 */
	if ($_POST["senha_user"]	==	$_POST["conf_senha_user"]) {
		require_once ('../model/Usuario.php');
		require_once ('../bd/Alterar.php');
		session_start();

		$usuario = new Usuario();

		$cpf_user = $_POST['cpf_user'];
		$senha_user = md5($_POST['senha_user']);
		$conf_senha_user = md5($_POST['conf_senha_user']);

		$usuario->setCpf_user($cpf_user);
		$usuario->setSenha_user($senha_user);
		$usuario->setConf_senha_user($conf_senha_user);

		$cpf_user = $usuario->getCpf_user();
		$senha_user = $usuario->getSenha_user();
		$conf_senha_user = $usuario->getConf_senha_user();

		$resultado = atualizarSenha($cpf_user, $senha_user, $conf_senha_user);

		if ($resultado == 1){
			unset($_SESSION['msgc']);
			$_SESSION['msgc'] = "<div class='alert alert-success' role='alert'>Senha atualizada com sucesso!</div>";
			header("Location:../index.php");
		}else{
			unset($_SESSION['msge']);
			$_SESSION['msge'] = "<div class='alert alert-danger' role='alert'>Ops! Ocorreu um erro.</div>";
			header("Location:../index.php");
		}
		
	}else{
		session_start();
		$_SESSION["cpf_user"] = $_POST['cpf_user'];
		unset($_SESSION['msger']);
		$_SESSION['msger'] = "<div class='alert alert-warning' role='alert'>Ops! Senhas não conferem.</div>";
		header("Location:../view/redefinir_nova_senha.php");
	}
?>