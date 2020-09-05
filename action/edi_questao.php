<?php 
/**
 * Created by Carolina Teixeira
 */
	require_once ('../model/Questao.php');
	require_once ('../model/Opcoes.php');
	require_once ('../bd/Alterar.php');
	require_once ('../bd/Buscar.php');
	session_start();

	/* ATUALIZAR QUESTAO*/
	$questao = new Questao();

	$cod_q = $_GET['idq'];
	$perg_q = $_POST["perg_q"];

	$questao->setCod_q($cod_q);
	$questao->setPerg_q($perg_q);

	$cod_q = $questao->getCod_q();
	$perg_q = $questao->getPerg_q();

	function encrypt($string, $key){
		return rtrim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $string, MCRYPT_MODE_ECB)));
	}
	$perg_q = encrypt($perg_q, md5("sfsdf434"));
	$resq = atualizarQuestao($cod_q, $perg_q);
		//se atualizada com sucesso então atualiza as opções
	if ($resq == 1){
		/*ATUALIZAR OPÇÕES*/
		$opcoes = new Opcoes();

		$questao_id_q = $cod_q;
		$ordem_op = 0;
		$op_ops = $_POST['op_op'];
			//pecorre o array das opções
		foreach( $op_ops AS $op_op ){
			$ordem_op++;

			$opcoes->setQuestao_id_q($questao_id_q);
			$opcoes->setOp_op($op_op);
			$opcoes->setOrdem_op($ordem_op);

			$questao_id_q = $opcoes->getQuestao_id_q();
			$op_op = $opcoes->getOp_op();
			$ordem_op = $opcoes->getOrdem_op();

				$op_op = encrypt($op_op, md5("sfsdf434"));	// criptografa a opção
				//função para atualizar as opções
				$resop = atualizarOpcao($questao_id_q, $op_op, $ordem_op);
			}
			unset($_SESSION['msg']);
			$_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Questão atualizada com sucesso!</div>";
			header("Location:../view/listar_questoes.php");
		}else{
			/*em caso de questão não atualizada*/
			unset($_SESSION['msge']);
			$_SESSION['msge'] = "<div class='alert alert-danger' role='alert'>Ops! Não foi possível atualizar.</div>";
			header("Location:../view/listar_questoes.php");
		}
?>