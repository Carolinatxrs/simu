<?php 
/**
 * Created by Carolina Teixeira
 */
	require_once ('../bd/Conexao.php');
	require_once ('../model/Questao.php');
	require_once ('../bd/Remover.php');
	session_start();

	$questao = new Questao();

	$cod_q = $_GET['idq'];	/*pega o id da questão*/

	$questao->setCod_q($cod_q);

	$cod_q = $questao->getCod_q();

	/*chama função para remover a questão*/
	$result = removerQuestao($cod_q);
	if($result == 1){
		/*chama função para remover as opções da questão*/
		$resultop = removerOpcoes($cod_q);	
		/*chama função para remover a resposta da questão*/
		$resul = removerResposta($cod_q);
		unset($_SESSION['msg']);
		$_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Questão removida com sucesso!</div>";
		header("Location:../view/listar_questoes.php");
	}else{
		unset($_SESSION['msge']);
		$_SESSION['msge'] = "<div class='alert alert-danger' role='alert'>Ops! Não foi possível remover a questão.</div>";
		header("Location:../view/listar_questoes.php");
	}
?>