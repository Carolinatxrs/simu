<?php 
/**
 * Created by Carolina Teixeira
 */
	require_once ('../model/Questao.php');
	require_once ('../model/Opcoes.php');
	require_once ('../model/Resposta.php');
	require_once ('../bd/Cadastrar.php');
	require_once ('../bd/Buscar.php');
	session_start();

	/* CADASTRAR QUESTAO*/
	$questao = new Questao();

	$cod_q = uniqid();
	$usuario_cpf_user = "";            	
	$exame_q = $_POST['exame_q'];                 	
	$area_q = $_POST['area_q'];                           
	$cat_q = $_POST['cat_q'];          	
	$ano_q = $_POST["ano_q"]; 
	$perg_q = $_POST["perg_q"];

	$questao->setCod_q($cod_q);
	$questao->setUsuario_cpf_user($usuario_cpf_user);
	$questao->setExame_q($exame_q);
	$questao->setArea_q($area_q);
	$questao->setCat_q($cat_q);
	$questao->setAno_q($ano_q);
	$questao->setPerg_q($perg_q);

	$cod_q = $questao->getCod_q();
	$usuario_cpf_user = $questao->getUsuario_cpf_user();
	$exame_q = $questao->getExame_q();
	$area_q = $questao->getArea_q();
	$cat_q = $questao->getCat_q();
	$ano_q = $questao->getAno_q();
	$perg_q = $questao->getPerg_q();

	function encrypt($string, $key){
		return rtrim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $string, MCRYPT_MODE_ECB)));
	}
	//função para tratamento de questões iguais
	function check_exist($perg_q){
		$resultadoq = buscarQuestaoDupl($perg_q);
		while ($data = $resultadoq->fetch_assoc()){
			if ($data['total'] < 1){
				return TRUE;
			}else{
				return FALSE;
			}
		}
	}
	//se questão ainda não estiver cadastrada, criptografa e cadastra
	if (check_exist(encrypt($perg_q, md5("sfsdf434"))) == TRUE){
		$perg_q = encrypt($perg_q, md5("sfsdf434"));
		$resq = cadastrarQuestao($cod_q, $usuario_cpf_user, $exame_q, $area_q, $cat_q, $ano_q, $perg_q);
		//se cadastrada com sucesso então cadastra as opções e a resposta
		if ($resq == 1){

			/*CADASTRAR OPÇÕES*/
			$opcoes = new Opcoes();

			$questao_id_q = $cod_q;
			$ordem_op = 0;
			$op_ops = $_POST['op_op'];
			$opAr = array();	//cria um array vazio
			//pecorre o array das opções
			foreach( $op_ops AS $op_op ){
				$cod_op = uniqid(); //gera os id de cada opcao
				$opAr[] = $cod_op;
				$ordem_op++;

				$opcoes->setCod_op($cod_op);
				$opcoes->setQuestao_id_q($questao_id_q);
				$opcoes->setOp_op($op_op);
				$opcoes->setOrdem_op($ordem_op);

				$cod_op = $opcoes->getCod_op();
				$questao_id_q = $opcoes->getQuestao_id_q();
				$op_op = $opcoes->getOp_op();
				$ordem_op = $opcoes->getOrdem_op();

				$op_op = encrypt($op_op, md5("sfsdf434"));	// criptografa a opção
				//função para cadastrar as opções
				$resop = cadastrarOpcao($cod_op, $questao_id_q, $op_op, $ordem_op);
			}
			/* CADASTRAR RESPOSTA*/
			$resposta = new Resposta();

			$res = $_POST["res"];
			switch($res){	//armazena o id da resposta correta
				case 'a':
				$opcoes_id_op = $opAr[0];
				break;
				case 'b':
				$opcoes_id_op = $opAr[1];
				break;
				case 'c':
				$opcoes_id_op = $opAr[2];
				break;
				case 'd':
				$opcoes_id_op = $opAr[3];
				break;
				case 'e':
				$opcoes_id_op = $opAr[4];
				break;
				default:
				$opcoes_id_op = $opAr[0];
			}

			$resposta->setQuestao_id_q($questao_id_q);
			$resposta->setOpcoes_id_op($opcoes_id_op);

			$questao_id_q = $resposta->getQuestao_id_q();
			$opcoes_id_op = $resposta->getOpcoes_id_op();

			//cadastra os dados da Reposta
			$resu = cadastrarResposta($questao_id_q, $opcoes_id_op);
			unset($_SESSION['msgcad']);
			$_SESSION['msgcad'] = "<div class='alert alert-success' role='alert'>Questão cadastrada com sucesso!</div>";
			header("Location:../view/questao.php?qid=$questao_id_q&res=$opcoes_id_op&exame=$exame_q&area=$area_q&ano=$ano_q");
		}else{
			/*em caso de questão não cadastrada*/
			unset($_SESSION['msg']);
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Ops! Não foi possível cadastrar.</div>";
			header("Location:../view/cadastrar_questoes.php");
		}
	}else{
		/*em caso de arquivos com o mesmo valor*/
		unset($_SESSION['msg']);
		$_SESSION['msg'] = "<div class='alert alert-warning' role='alert'>Ops! Questão já se encontra cadastrada.</div>";
		header("Location:../view/cadastrar_questoes.php");
	}
?>