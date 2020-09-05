<?php
	require"../bd/VerefAdSession.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Questão cadastrada</title>
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
			<?php include('bar_top_admin.php');?>
			<div class="content-wrapper">
				<div class="content-container">
					<?php include('bar_left_admin.php');?>  
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
										<li><a href="menu_admin.php"><i class="fa fa-home"></i>Início</a></li>
										<li>Questões</li>
										<li class="active">Cadastrar</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="container-fluid">
							<div class="row">
								<div class="col-md-12">
									<div class="panel">
										<div class="panel-body">
											<?php
											require_once ('../bd/Conexao.php');
											$con = new Conexao();
											if(isset($_SESSION['msgcad'])){
												echo $_SESSION['msgcad'];
												unset($_SESSION['msgcad']);
											}
											function decrypt($string, $key){
												return rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, base64_decode($string), MCRYPT_MODE_ECB));
											}
											$id_q = $_GET['qid'];
											$id_r = $_GET['res'];
											$exame_q = $_GET['exame'];
											$area_q = $_GET['area'];	
											$ano_q = $_GET['ano'];

											$sql_q = "SELECT * FROM questao WHERE id_q = '$id_q'";
											$resultado_q = mysqli_query($con->conexao(),$sql_q);
											?>
											<div class="card card-default">
												<div class="card-header"><?php echo " ".strtoupper($exame_q)." – ".$area_q." (".$ano_q.")";?></div>
												<div class="card-body">
													<?php 
													while($rowq=mysqli_fetch_array($resultado_q) ){
													$perg_q = decrypt($rowq['perg_q'], md5("sfsdf434")); //salva a questão
													?>
													<p class="card-text">
														<b>Questão:</b><?php echo $perg_q; ?>
													</p>
													<hr class="my-4">
													<?php 
												}
												/*BUSCAR OPÇÕES*/
												$sql_op = "SELECT * FROM opcoes WHERE questao_id_q = '$id_q' ORDER BY ordem_op ASC";
												$resultado_op = mysqli_query($con->conexao(),$sql_op);
												while($row_op=mysqli_fetch_array($resultado_op) ){
														$opid = $row_op['id_op']; //salva o id das opções
														$op_op = decrypt($row_op['op_op'], md5("sfsdf434")); //salva as opções
														?>
														<p class="card-text">
															<div class="bloco_opcao">
																<div class="radio">
																	<input type="radio" name="res" disabled>
																	<?php if ($opid == $id_r) {
																		echo "<div style='color:#32CD32'>".$op_op."
																		</div>";
																	} else {
																		echo $op_op;
																	} ?>
																	
																</div>
															</div>
														</p>
													<?php } ?>
												</div>
												<div class="card-footer text-right"></div>
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