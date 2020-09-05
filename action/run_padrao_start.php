<?php
/**
 * Created by Carolina Teixeira
 */
	require_once ('../model/Historico.php');
	require_once ('../model/Ranking.php');
	require_once ('../bd/Buscar.php');
	require_once ('../bd/Cadastrar.php');
	require_once ('../bd/Alterar.php');
	session_start();

	$nq = $_GET['n'];		//recebe a ordem da questão
	$total = $_GET['t'];	//recebe o total de questões
	$qid = $_GET['qid'];	//recebe o id da questão
	$ano_q = $_GET['a'];	//ano da questão
	$exame_q = $_GET['ex'];	//tipo de exame
	$res = $_POST['res'];	//POST recebe o id da resposta do usuário
	$qtd_q = $total+1;		//para total de questões

	/*função para buscar a resposta de cada questão*/
	$resultado = buscarResposta($qid);
	$opcoes_id_op = $resultado['opcoes_id_op'];

	$historico = new Historico();
	
	$id_his = $_GET['idh'];	//id do historico
	$usuario_cpf_user = $_SESSION['cpf_user'];

	$historico->setId_his($id_his);
	$historico->setUsuario_cpf_user($usuario_cpf_user);

	$id_his = $historico->getId_his();
	$usuario_cpf_user = $historico->getUsuario_cpf_user();

	//se a resposta do user for igual ao id da resposta correta
	if($res == $opcoes_id_op){
		$ponto_q = 1;	//recebe a pontuaçao da questão
		/*função para buscar historico de acordo com o idh e cpf*/
		$resulth = buscarHistorico($id_his, $usuario_cpf_user);
		$ponto_acum_his = $resulth['ponto_his'];
		$qt_ac = $resulth['qtd_ac_his'];

		$qt_ac++;	//incrementa a quantidade de acertos feito pelo usuário
		$ponto_acum_his = $ponto_acum_his+$ponto_q; //calcula a pontuaçao atual do usuário com cada questão certa
		/*função para atualizar o historico do usuario*/
		$resultadoh = atualizarHistoricoAc($qtd_q, $qt_ac, $ponto_acum_his, $id_his, $usuario_cpf_user);
		/*array para detalhar resultado do usuário*/
		$_SESSION['resp'][$nq]  = "1"; //se a resposta for correta armazena 1
	}else{
		/*função para buscar historico de acordo com o id e cpf*/
		$resulth = buscarHistorico($id_his, $usuario_cpf_user);
		$qt_er = $resulth['qtd_er_his'];
		
		$qt_er++;	//incrementa a quantidade de erros feito pelo usuário
		/*função para atualizar o historico do usuario*/
		$resultadohis = atualizarHistoricoEr($qtd_q, $qt_er, $id_his, $usuario_cpf_user);
		/*array para detalhar resultado do usuário*/
		$_SESSION['resp'][$nq]  = "X";	//se a resposta for errada armazena X
	}

	if($nq != $total){
		$nq++;	//incrementa a ordem e chama a proxima questao
		header("location:../view/padrao_start.php?n=$nq&t=$total&idh=$id_his&a=$ano_q&ex=$exame_q");
	}else{
		/*função para buscar historico do usuario*/
		$resulth = buscarHistorico($id_his, $usuario_cpf_user);
		$ponto_r = $resulth['ponto_his'];

		$ranking = new Ranking();

		$ranking->setPonto_r($ponto_r);
		$ponto_r = $ranking->getPonto_r();

		/*função para buscar o ranking do usuario*/
		$rowcont = 0;
		$resultr = buscarRank($usuario_cpf_user);
		while($row = mysqli_fetch_row($resultr)){
			$ponto_rank = $row[2];	//armazena pontuação do usuario
			$rowcont++;				//conta as linhas da busca
		}
		if($rowcont == 0){
			/*função para cadastrar o rank do usuario*/
			$resrank = cadastrarRanking($usuario_cpf_user, $ponto_r);
		}else{ // se o numero de linhas do select for diferente de 0
			//soma a pontuação atual do rank + a pontuação do historico
			$ponto_rank = $ponto_rank+$ponto_r;
			/*função para atualizar a pontuação no rank do usuario*/
			$resultrank = atualizarRanking($ponto_rank, $usuario_cpf_user);
		}
		//finaliza as questões e chama resultado
		header("location:../view/resultado_padrao.php?idh=$id_his");
	}
?>