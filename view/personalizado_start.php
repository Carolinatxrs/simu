<?php
	require"../bd/VerefSession.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Simulado Personalizado</title>
        <link rel="shortcut icon" href="../templates/images/fav/fav.ico" type="image/x-icon">
        <link rel="stylesheet" href="../templates/menu/css/bootstrap.min.css" media="screen" >
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="../templates/menu/css/animate-css/animate.min.css" media="screen" >
		<link rel="stylesheet" href="../templates/menu/css/lobipanel/lobipanel.min.css" media="screen" >
		<link rel="stylesheet" href="../templates/menu/css/prism/prism.css" media="screen" >
		<link rel="stylesheet" href="../templates/menu/css/select2/select2.min.css" >
		<link rel="stylesheet" href="../templates/menu/css/main.css" media="screen" >
		<script src="../templates/menu/js/modernizr/modernizr.min.js"></script>
	</head>
	<body class="top-navbar-fixed">
		<div class="main-wrapper">
			<?php include('bar_top.php');?>
			<div class="content-wrapper">
				<div class="content-container">
					<?php include('bar_left.php');?>  
					<div class="main-page">
						<div class="container-fluid">
							<div class="row page-title-div">
								<div class="col-md-6">
									<h2 class="title">Simulado</h2>
								</div>
							</div>
							<div class="row breadcrumb-div">
								<div class="col-md-6">
									<ul class="breadcrumb">
										<li><a href="menu_user.php"><i class="fa fa-home"></i>Início</a></li>
										<li>Simulados</li>
										<li class="active">Personalizado</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="container-fluid">
							<div class="row">
								<div class="col-md-12">
									<div class="panel">
										<div class="panel-heading">
											<div class="panel-title">
												<h5>Simulado Personalizado</h5>
											</div>
										</div>
										<div class="panel-body">
										<?php
											function decrypt($string, $key){
												return rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, base64_decode($string), MCRYPT_MODE_ECB));
											}
											$qn = $_GET['n'];		//posição do array
											$total = $_GET['t'];	//total de questões
											$id_his = $_GET['idh'];	//id do historico
											$cat_q = $_GET['c'];
											$exame_q = $_GET['ex'];
											require_once ('../bd/Conexao.php');
											$con = new Conexao();

											$codq = $_SESSION['codqs']; //recebe o array dos id's
											$cont = 0;
											$cod = $codq[$qn];	// recebe o id da posição qn
											/*realiza a consulta de acordo com o id passado*/
											$sql_pers = "SELECT * FROM questao WHERE id_q = '$cod'";
											$resultado_pers = mysqli_query($con->conexao(),$sql_pers);
										?>
											<div class="card card-default">
												<div class="card-header"><i class="fa fa-tasks"></i><?php echo " ".strtoupper($exame_q)." – ".$cat_q; ?></div>
												<div class="card-body">
												<?php 
													while($row_q=mysqli_fetch_array($resultado_pers)){
													$qcod = $row_q['id_q']; //salva o id de cada questao
													$per_q = decrypt($row_q['perg_q'], md5("sfsdf434")); //salva a questão
													$cont = $qn + 1;
												?>
													<p class="card-text">
														<b>Questão <?php echo $cont; ?>:</b><?php echo $per_q; ?>
													</p>
													<hr class="my-4">

												<?php 
													}
													/*BUSCAR OPÇÕES*/
													$sql_opc = "SELECT * FROM opcoes WHERE questao_id_q = '$qcod' ORDER BY ordem_op ASC";
													$resultado_opc = mysqli_query($con->conexao(),$sql_opc);
												?>
													<form action="../action/run_personalizado_start.php?n=<?php echo $qn; ?>&t=<?php echo $total; ?>&qcod=<?php echo $qcod; ?>&idh=<?php echo $id_his; ?>&c=<?php echo $cat_q; ?>&ex=<?php echo $exame_q; ?>" method="POST" class="form-horizontal">
													<?php 
														while($row_op=mysqli_fetch_array($resultado_opc)){
															$opcod = $row_op['id_op']; //salva o id das opções
															$op_opc = decrypt($row_op['op_op'], md5("sfsdf434")); //salva as opções
													?>
														<p class="card-text">
															<div class="bloco_opcao">
																<div class="radio">
																	<input type="radio" value="<?php echo $opcod; ?>" name="resp" required autofocus> <?php echo $op_opc; ?>
																</div>
															</div>
														</p>
													<?php } ?>
														<div class="form-group">
															<div class="bloco_correcao">
																<button type="submit" class="btn btn-success btn-lg">Enviar</button>
																<a class="btn btn-warning btn-lg" href="resultado_personalizado.php?idh=<?php echo $id_his; ?>" role="button">Cancelar</a>
															</div>
														</div>
													</form>
												</div>
												<div class="card-footer text-center"><?php $t=$total+1; echo "Questão $cont de $t"; ?></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
		<!-- Rodapé -->
		<!-- Footer -->
		<?php include('footer.php');?> 
		<!-- Footer -->
		<script src="../templates/menu/js/jquery/jquery-2.2.4.min.js"></script>
		<script src="../templates/menu/js/bootstrap/bootstrap.min.js"></script>
		<script src="../templates/menu/js/pace/pace.min.js"></script>
		<script src="../templates/menu/js/lobipanel/lobipanel.min.js"></script>
		<script src="../templates/menu/js/iscroll/iscroll.js"></script>
		<script src="../templates/menu/js/prism/prism.js"></script>
		<script src="../templates/menu/js/select2/select2.min.js"></script>
		<script src="../templates/menu/js/main.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=TeX-AMS_HTML"></script>
		<script type="text/x-mathjax-config"> MathJax.Hub.Config({ tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]} }); 
		</script>
	</body>
</html>