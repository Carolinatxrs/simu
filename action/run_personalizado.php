<?php 
/**
 * Created by Carolina Teixeira
 */
	require_once ('../model/Questao.php');
	require_once ('../bd/Buscar.php');
	require_once ('../model/Historico.php');
	require_once ('../bd/Cadastrar.php');

	session_start();

	$questao = new Questao();

	$exame_q = $_POST['exame_q'];                	
	$cat_q = $_POST['cat_q'];  
	$qtd_q = $_POST['qtd_q'];                              	
	$codq = array();		//cria um array vazio

	$questao->setExame_q($exame_q);
	$questao->setCat_q($cat_q);

	$exame_q = $questao->getExame_q();
	$cat_q = $questao->getCat_q();

	/*função para buscar as questões*/
	$resulper = buscarSimuPers($exame_q, $cat_q, $qtd_q);
	while($row = mysqli_fetch_row($resulper)){
		$codq[] = $row[0];	//armazena os id's das questões
	}

	unset($_SESSION['codqs']);	//limpa a variavel do array
	$_SESSION['codqs'] = $codq;	//recebe o array com id's das questões

	/*tratamento para salvar o id do historico e cpf do usuario na tabela historico*/
	$historico = new Historico();

	date_default_timezone_set('America/Manaus');
	$id_his = uniqid();		//gera o id do historico
	$usuario_cpf_user = $_SESSION['cpf_user'];
	$simulado_his = "Personalizado";
	$exame_his = $exame_q;
	$data_his = date('d/m/Y');
	$qtd_q_his = $qtd_q;
	$qtd_ac_his = 0;
	$qtd_er_his = 0;
	$ponto_his = 0;

	$historico->setId_his($id_his);
	$historico->setUsuario_cpf_user($usuario_cpf_user);
	$historico->setSimulado_his($simulado_his);
	$historico->setExame_his($exame_his);
	$historico->setData_his($data_his);
	$historico->setQtd_q_his($qtd_q_his);
	$historico->setQtd_ac_his($qtd_ac_his);
	$historico->setQtd_er_his($qtd_er_his);
	$historico->setPonto_his($ponto_his);

	$id_his = $historico->getId_his();
	$usuario_cpf_user = $historico->getUsuario_cpf_user();
	$simulado_his = $historico->getSimulado_his();
	$exame_his = $historico->getExame_his();
	$data_his = $historico->getData_his();
	$qtd_q_his = $historico->getQtd_q_his();
	$qtd_ac_his = $historico->getQtd_ac_his();
	$qtd_er_his = $historico->getQtd_er_his();
	$ponto_his = $historico->getPonto_his();

	/*função para cadastrar o idh e cpf no historico*/
	$resulh = cadastrarHistorico($id_his, $usuario_cpf_user, $simulado_his, $exame_his, $data_his, $qtd_q_his, $qtd_ac_his, $qtd_er_his, $ponto_his);
	/*fim do tratamento do historico*/

	$qtd_q--;	//para o total de questões fica igual ao tamanho do array
	//unset($_SESSION['resposta']);
	$_SESSION['resposta'] = array();
	header("Location:../view/personalizado_start.php?n=0&t=$qtd_q&idh=$id_his&c=$cat_q&ex=$exame_q");
?>