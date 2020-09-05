<?php 
/**
 * Created by Carolina Teixeira
 */
	require_once ('../templates/wideimage/WideImage.php');
	require_once ('../model/Usuario.php');
	require_once ('../bd/Buscar.php');
	require_once ('../bd/Alterar.php');
	session_start();

	$usuario = new Usuario();

	$cpf_user = $_POST['cpf_user'];
	$nome_user = $_POST['nome_user'];
	$sobrenome_user = $_POST['sobrenome_user'];
	$sexo_user = $_POST['sexo_user'];
	$instituto_user = $_POST['instituto_user'];
	$cidade_user = $_POST['cidade_user'];
	$uf_user = $_POST['uf_user'];
	$senha_user = $_POST['senha_user'];
	$conf_senha_user = "";
	$foto = $_FILES["foto_user"];
	$loc_user = "../bd/img/user/";

	/*TRATAMENTO DO UPLOAD*/
	if(!preg_match("/^image\/(png|jpg|jpeg)$/", $foto["type"])){
		unset($_SESSION['msg']);
		$_SESSION['msg'] = "<div class='alert alert-warning' role='alert'>Ops! Você não pode fazer upload de arquivo deste tipo.</div>";
		header("Location:../view/atualizar_user.php");
	}else{
		preg_match("/\.(png|jpg|jpeg){1}$/i", $foto["name"], $ext);
		$nome_imagem = $foto['name'];
		$caminho_imagem = $loc_user;
		$format_imagem = utf8_decode($caminho_imagem.$nome_imagem);	
		$foto_user = $foto['name'];
		/*FIM DO TRATAMENTO DO UPLOAD*/

		$usuario->setCpf_user($cpf_user);
		$usuario->setNome_user($nome_user);
		$usuario->setSobrenome_user($sobrenome_user);
		$usuario->setSexo_user($sexo_user);
		$usuario->setInstituto_user($instituto_user);
		$usuario->setCidade_user($cidade_user);
		$usuario->setUf_user($uf_user);
		$usuario->setSenha_user($senha_user);
		$usuario->setConf_senha_user($conf_senha_user);
		$usuario->setFoto_user($foto_user);
		$usuario->setLoc_user($loc_user);

		$cpf_user = $usuario->getCpf_user();
		$nome_user = ucwords($usuario->getNome_user());
		$sobrenome_user = ucwords($usuario->getSobrenome_user());
		$sexo_user = $usuario->getSexo_user();
		$instituto_user = strtoupper($usuario->getInstituto_user());
		$cidade_user = ucwords($usuario->getCidade_user());
		$uf_user = strtoupper($usuario->getUf_user());
		$senha_user = $usuario->getSenha_user();
		$conf_senha_user = $usuario->getConf_senha_user();
		$foto_user = $usuario->getFoto_user();
		$loc_user = $usuario->getLoc_user();

		//tratamento para fotos que já foram salvas anteriomente
		$resultado = buscarFotoUsuario($cpf_user, $senha_user);
		$tmp = $resultado['foto_user'];
		$img = utf8_decode($tmp);	//tratamento para os benditos acentos

		//atualiza os dados
		$result = atualizarUsuario($cpf_user, $nome_user, $sobrenome_user, $sexo_user, $instituto_user, $cidade_user, $uf_user, $senha_user, $conf_senha_user, $foto_user, $loc_user);
		if($result == 1){
			//verifica se existe no servidor foto anterior e apaga
			if(file_exists($loc_user.$img) && $img != "")	$del = unlink($loc_user.$img);
			//salva nova foto no servidor
			$image = WideImage::load('foto_user');
			$nova_img = $image->resize(180, 180,'fill');
			$nova_img -> saveToFile($format_imagem);
			unset($_SESSION['msgcad']);
			$_SESSION['msgcad'] = "<div class='alert alert-success' role='alert'>Dados atualizados com sucesso!</div>";
			header("Location:../view/atualizar_user.php");
		}else{
			unset($_SESSION['msg']);
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Ops! Não foi possível atualizar. Por favor, altere o nome da sua foto.</div>";
			header("Location:../view/atualizar_user.php");
		}
	}
?>