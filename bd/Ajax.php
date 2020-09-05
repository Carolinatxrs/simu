<?php
/**
 * Created by Carolina Teixeira
 */
	/*requisição ajax para quantidade de questões do simulado personalizado*/
	require_once ('Conexao.php');

	$con = new Conexao();

	session_start();

	$exame_q = $_GET['exame_q'];	//recebe o tipo de exame a categoria
	$cat_q = $_GET['cat_q'];
	/*busca de acordo com os dados informados as questões*/
	$sqlt = "SELECT * FROM questao WHERE exame_q = '$exame_q' AND cat_q = '$cat_q'";
	$result_qtd = mysqli_query($con->conexao(),$sqlt);
	/*conta o numero de linhas*/
	$t = $result_qtd->num_rows;
	/*retorna para quatidade de questões*/
	echo json_encode($t);exit;

?>