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
	$area_q = $_POST['area_q'];                                	
	$ano_q = $_POST["ano_q"];

	// $id_his = uniqid();		//gera o id do historico
	$cont = 0;
	$idq = array();		//cria um array vazio

	$questao->setExame_q($exame_q);
	$questao->setArea_q($area_q);
	$questao->setAno_q($ano_q);

	$exame_q = $questao->getExame_q();
	$area_q = $questao->getArea_q();
	$ano_q = $questao->getAno_q();

	/*se exame for enade então faz a busca com o nome, area e ano*/
	if($exame_q == "Enade"){
		$resultado = buscarSimuPadEna($exame_q, $area_q, $ano_q);
		while($row = mysqli_fetch_row($resultado)){
			$idq[] = $row[0];	//armazena os id's das questões
			$cont++;			//contagem para o total de questões
		}
		if($cont >= 1){
			unset($_SESSION['idqs']);	//limpa a variavel do array
			$_SESSION['idqs'] = $idq;	//recebe o array com id's das questões

			/*tratamento para salvar o id do historico e cpf do usuario na tabela historico*/
			$historico = new Historico();

			date_default_timezone_set('America/Manaus');
			$id_his = uniqid();		//gera o id do historico
			$usuario_cpf_user = $_SESSION['cpf_user'];
			$simulado_his = "Padrão";
			$exame_his = $exame_q;
			$data_his = date('d/m/Y');
			$qtd_q_his = $cont;
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

			$cont--;	//para o total de questões fica igual ao tamanho do array
			// unset($_SESSION['resp']);	//limpa o array das respostas
			$_SESSION['resp'] = array();
			header("Location:../view/padrao_start.php?n=0&t=$cont&idh=$id_his&a=$ano_q&ex=$exame_q");
		}else{
			unset($_SESSION['msger']);
			$_SESSION['msger'] = "<div class='alert alert-warning' role='alert'>Ops! Ainda não temos questões de acordo com suas especificações.</div>"; //caso não tenha questões
			header("Location:../view/padrao_sim.php");
		}

	}else{
		/*chama a função que busca as questões do poscomp*/
		$resultado = buscarSimuPadPos($exame_q, $ano_q);
		while($row = mysqli_fetch_row($resultado)){
			$idq[] = $row[0];
			$cont++;
		}
		if ($cont >= 1){
			unset($_SESSION['idqs']);
			$_SESSION['idqs'] = $idq;

			/*tratamento para salvar o id do historico e cpf do usuario na tabela historico*/
			$historico = new Historico();

			date_default_timezone_set('America/Manaus');
			$id_his = uniqid();		//gera o id do historico
			$usuario_cpf_user = $_SESSION['cpf_user'];
			$simulado_his = "Padrão";
			$exame_his = $exame_q;
			$data_his = date('d/m/Y');
			$qtd_q_his = $cont;
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

			$cont--;
			// unset($_SESSION['resp']);
			$_SESSION['resp'] = array();
			header("Location:../view/padrao_start.php?n=0&t=$cont&idh=$id_his&a=$ano_q&ex=$exame_q");
		}else{
			unset($_SESSION['msger']);
			$_SESSION['msger'] = "<div class='alert alert-warning' role='alert'>Ops! Ainda não temos questões de acordo com suas especificações.</div>";
			header("Location:../view/padrao_sim.php");
		}
	}
?>