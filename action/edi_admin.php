<?php
/**
 * Created by Carolina Teixeira
 */
	if ($_POST["senha_admin"]	==	$_POST["conf_senha_admin"]) {
	
		require_once ('../templates/wideimage/WideImage.php');
		require_once ('../model/Admin.php');
		require_once ('../bd/Buscar.php');
		require_once ('../bd/Alterar.php');
		session_start();

		$admin = new Admin();

		$login_admin = $_POST['login_admin'];
		$senha_admin = md5($_POST['senha_admin']);
		$conf_senha_admin = md5($_POST['conf_senha_admin']);
		$loc_admin = "../bd/img/admin/";

		/*TRATAMENTO DO UPLOAD*/
		$foto = $_FILES["foto_admin"];
	
		if(!preg_match("/^image\/(png|jpg|jpeg)$/", $foto["type"])){
			unset($_SESSION['msg']);
			$_SESSION['msg'] = "<div class='alert alert-warning' role='alert'>Ops! Você não pode fazer upload de arquivo deste tipo.</div>";
			header("Location:../view/atualizar_admin.php");
		}else{
			preg_match("/\.(png|jpg|jpeg){1}$/i", $foto["name"], $ext);
			$nome_imagem = $foto['name'];
			$caminho_imagem = $loc_admin;
			$format_imagem = utf8_decode($caminho_imagem.$nome_imagem);
			$foto_admin = $foto['name'];
			/*FIM DO TRATAMENTO DO UPLOAD*/

			$admin->setLogin_admin($login_admin);
			$admin->setSenha_admin($senha_admin);
			$admin->setConf_senha_admin($conf_senha_admin);
			$admin->setFoto_admin($foto_admin);
			$admin->setLoc_admin($loc_admin);

			$login_admin = $admin->getLogin_admin();
			$senha_admin = $admin->getSenha_admin();
			$conf_senha_admin = $admin->getConf_senha_admin();
			$foto_admin = $admin->getFoto_admin();
			$loc_admin = $admin->getLoc_admin();

			//tratamento para fotos que já foram salvas anteriomente
			$resultado = buscarFotoAdmin($login_admin);
			$tmp = $resultado['foto_admin'];
			$img = utf8_decode($tmp);	//tratamento para os benditos acentos
			
			//atualiza os dados
			$resultado = atualizarAdmin($login_admin, $senha_admin, $conf_senha_admin, $foto_admin, $loc_admin);
			if ($resultado == 1){
				//verifica se existe no servidor foto anterior e apaga
				if(file_exists($loc_admin.$img) && $img != "")	$del = unlink($loc_admin.$img);
				//salva nova foto no servidor
				$image = WideImage::load('foto_admin');
				$nova_img = $image->resize(180, 180,'fill');
				$nova_img -> saveToFile($format_imagem);
				unset($_SESSION['msgcad']);
				$_SESSION['msgcad'] = "<div class='alert alert-success' role='alert'>Dados atualizados com sucesso!</div>";
				header("Location:../view/atualizar_admin.php");
			}else{
				//em caso de arquivos com o mesmo nome
				unset($_SESSION['msg']);
				$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Ops! Não foi possível atualizar. Por favor, altere o nome da sua foto.</div>";
				header("Location:../view/atualizar_admin.php");
			}
		}

	}else{
		session_start();
		unset($_SESSION['msg']);
		$_SESSION['msg'] = "<div class='alert alert-warning' role='alert'>Ops! Senhas não conferem.</div>";
		header("Location:../view/atualizar_admin.php");
	}
?>