<?php 
/**
 * Created by Carolina Teixeira
 */
	require_once ('../model/Usuario.php');
	require_once ('../bd/Cadastrar.php');
	session_start();
	
	$usuario = new Usuario();
	
	$cpf_user = $_POST['cpf_user'];
	$nome_user = $_POST['nome_user'];
	$sobrenome_user = $_POST['sobrenome_user'];
	$sexo_user = $_POST['sexo_user'];
	$data_user = $_POST['dt_nasc_user'];
	$instituto_user = $_POST['inst_user'];
	$cidade_user = $_POST['city_user'];
	$uf_user = $_POST['uf_user'];
	$senha_user = md5($_POST['senha_user']);

	/*tratamento para data*/
	$dt_nasc_user = date('d/m/Y',  strtotime($data_user));

	$usuario->setCpf_user($cpf_user);
	$usuario->setNome_user($nome_user);
	$usuario->setSobrenome_user($sobrenome_user);
	$usuario->setSexo_user($sexo_user);
	$usuario->setDt_nasc_user($dt_nasc_user);
	$usuario->setInstituto_user($instituto_user);
	$usuario->setCidade_user($cidade_user);
	$usuario->setUf_user($uf_user);
	$usuario->setSenha_user($senha_user);

	$cpf_user = $usuario->getCpf_user();
	$nome_user = ucwords($usuario->getNome_user());
	$sobrenome_user = ucwords($usuario->getSobrenome_user());
	$sexo_user = $usuario->getSexo_user();
	$dt_nasc_user = $usuario->getDt_nasc_user();
	$instituto_user = strtoupper($usuario->getInstituto_user());
	$cidade_user = ucwords($usuario->getCidade_user());
	$uf_user = strtoupper($usuario->getUf_user());
	$senha_user = $usuario->getSenha_user();

	$resultado = cadastrarUsuario($cpf_user, $nome_user, $sobrenome_user, $sexo_user, $dt_nasc_user, $instituto_user, $cidade_user, $uf_user, $senha_user);
	if ($resultado == 1){
		unset($_SESSION['msgc']);
		$_SESSION['msgc'] = "<div class='alert alert-success' role='alert'>$nome_user cadastrado(a) com sucesso!</div>";
		header("Location:../index.php");
	}else{
		unset($_SESSION['msge']);
		$_SESSION['msge'] = "<div class='alert alert-danger' role='alert'>Ops! Este CPF já está cadastrado ou dados não foram preenchidos corretamente.</div>";
		header("Location:../index.php");
	}

?>