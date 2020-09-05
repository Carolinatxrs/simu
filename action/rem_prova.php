<?php 
/**
 * Created by Carolina Teixeira
 */
	require_once ('../bd/Conexao.php');
	require_once ('../model/Prova.php');
	require_once ('../bd/Buscar.php');
	require_once ('../bd/Remover.php');
	session_start();

	$prova = new Prova();

	$id_p = $_GET['idp'];	/*pega o id da prova*/

	$prova->setId_p($id_p);

	$id_p = $prova->getId_p();

	/*busca o doc da prova*/
	$resultado = buscarProva($id_p);
	$tmp = $resultado['doc_p'];
	$loc_p = $resultado['loc_p'];
	$doc	=	utf8_decode($tmp);	//tratamento para os acentos

	/*chama função para remover prova*/
	$result = removerProva($id_p);
	if($result == 1){
		//verifica se o doc existe no servidor e apaga
		if(file_exists($loc_p.$doc) && $doc != "")	$del = unlink($loc_p.$doc);
		unset($_SESSION['msgr']);
		$_SESSION['msgr'] = "<div class='alert alert-success' role='alert'>Prova removida com sucesso!</div>";
		header("Location:../view/provas.php");
	}else{
		unset($_SESSION['msge']);
		$_SESSION['msge'] = "<div class='alert alert-danger' role='alert'>Ops! Não foi possível remover a prova.</div>";
		header("Location:../view/provas.php");
	}
?>