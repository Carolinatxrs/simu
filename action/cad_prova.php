<?php
/**
 * Created by Carolina Teixeira
 */
	if (($_POST["exame_p"] == "Enade" && $_POST["area_p"] != "0") || ($_POST["exame_p"] == "Poscomp" && $_POST["area_p"] == "0")){

		require_once ('../model/Prova.php');
		require_once ('../bd/Cadastrar.php');
		require_once ('../bd/Conexao.php');
		session_start();

		$prova = new Prova();

		$admin_login_admin = $_SESSION["login_admin"];
		$exame_p = $_POST['exame_p'];
		$area_p = $_POST['area_p'];
		$ano_p = $_POST['ano_p'];
		$doc = $_FILES["doc_p"];
		$loc_p = "../bd/doc/";

		/*TRATAMENTO DO UPLOAD*/
		$nome_doc = $doc['name'];
		preg_match_all('/\.[a-zA-Z0-9]+/', $nome_doc, $extensao);
		if (!in_array(strtolower(current(end($extensao))), array('.pdf', '.doc', '.docx'))) {
			unset($_SESSION['msg']);
			$_SESSION['msg'] = "<div class='alert alert-warning' role='alert'>Ops! Você não pode fazer upload de arquivo deste tipo.</div>";
			header("Location:../view/cadastrar_provas.php");
		}else{
			$caminho_doc = $loc_p;
			$format_doc = utf8_decode($caminho_doc.$nome_doc);
			$doc_p = $doc['name'];
			/*FIM DO TRATAMENTO DO UPLOAD*/

			$prova->setAdmin_login_admin($admin_login_admin);
			$prova->setExame_p($exame_p);
			$prova->setArea_p($area_p);
			$prova->setAno_p($ano_p);
			$prova->setDoc_p($doc_p);
			$prova->setLoc_p($loc_p);

			$admin_login_admin = $prova->getAdmin_login_admin();
			$exame_p = $prova->getExame_p();
			$area_p = $prova->getArea_p();
			$ano_p = $prova->getAno_p();
			$doc_p = $prova->getDoc_p();
			$loc_p = $prova->getLoc_p();

			/*atualiza os dados e salva doc no servidor*/
			$resultado = cadastrarProva($admin_login_admin, $exame_p, $area_p, $ano_p, $doc_p, $loc_p);
			if($resultado == 1){
				move_uploaded_file($doc['tmp_name'], $format_doc);
				unset($_SESSION['msgcad']);
				$_SESSION['msgcad'] = "<div class='alert alert-success' role='alert'>Prova cadastrada com sucesso!</div>";
				header("Location:../view/cadastrar_provas.php");
			}else{
				unset($_SESSION['msg']);
				$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Ops! Não foi possível cadastrar. Por favor, altere o nome do anexo de acordo com o exame e ano.</div>";
				header("Location:../view/cadastrar_provas.php");
			}
		}

	}else{
		session_start();
		unset($_SESSION['msg']);
		$_SESSION['msg'] = "<div class='alert alert-warning' role='alert'>Para o exame do Enade é necessário selecionar uma área.</div>";
		header("Location:../view/cadastrar_provas.php");
	}
?>