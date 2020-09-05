<?php
	require"../bd/VerefSession.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Resultado</title>
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
										<li>Padrão</li>
										<li class="active">Resultado</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="container-fluid">
							<div class="row">
								<div class="col-md-12">
									<div class="panel">
										<div class="panel-body">
											<div class="resultado">
												<div class="form-group">
													<label for="default" class="col-md-2 control-label"></label>
													<div class="col-sm-8">
														<div class="panel panel-mycor">
															<?php 
															require_once ('../bd/Conexao.php');
															$con = new Conexao();
															$cpf_user = $_SESSION['cpf_user'];
																$id_his = $_GET['idh'];	//id do historico
																
																$sql_his = "SELECT * FROM historico WHERE id_his = '$id_his' AND usuario_cpf_user = '$cpf_user'";
																$resul_h = mysqli_query($con->conexao(),$sql_his);
																while($sql_his = mysqli_fetch_array($resul_h)){
																	$qtd_q_his = $sql_his['qtd_q_his'];
																	?>
																	<div class="panel-heading text-center">
																		<?php echo " ".$sql_his['simulado_his']." – ".strtoupper($sql_his['exame_his'])." (Resultado)"; ?>						
																	</div>
																	<!-- Table -->
																	<table class="table">
																		<tbody>
																			<tr>
																				<td><b>Total de Questões</b></td>
																				<td class="text-center"><span class="label label-sm  label-info"><?php echo $sql_his['qtd_q_his']; ?></span></td> 
																			</tr>
																			<tr>
																				<td><b>Acertos</b></td>
																				<td class="text-center"><span class="label label-sm  label-success"><?php echo $sql_his['qtd_ac_his']; ?></span></td>
																			</tr>
																			<tr>
																				<td><b>Erros</b></td>
																				<td class="text-center"><span class="label label-sm  label-danger"><?php echo $sql_his['qtd_er_his']; ?></span></td>
																			</tr>
																			<tr>
																				<td><b>Desempenho</b></td>
																				<?php $score = ((100*$sql_his['qtd_ac_his'])/$sql_his['qtd_q_his']);

																				$ponto_his = round($score,2);
																				if($ponto_his >= '70'){
																					echo "<td class='text-center'><span class='label label-sm  label-success'>".$ponto_his."%</span></td>";
																				}elseif ($ponto_his >= '50' && $ponto_his < '70') {
																					echo "<td class='text-center'><span class='label label-sm  label-warning'>".$ponto_his."%</span></td>";
																				}else {
																					echo "<td class='text-center'><span class='label label-sm  label-danger'>".$ponto_his."%</span></td>";
																				}
																				?>
																			</tr>
																		</tbody>
																	</table>
																<?php } ?>
															</div>
															<ul class="list-group">
																<li class="list-group-item">
																	<strong>Detalhes do seu Resultado</strong>
																</li>
															</ul>
															<div class="row">
																<?php
																$resp = $_SESSION['resp'];
																$p=0;

																for($i=1; $i <= $qtd_q_his; $i++){
																	?>
																	<div class="col-sm-3">
																		<div class="answerkeys">
																			<?php 
																			echo "# $i "; 
																			if(!empty($resp[$p])){

																				if($resp[$p] == "1"){
																					echo "<div class='label label-success' title='Certa'>
																					<i class='fa fa-check'></i>
																					</div>";
																				}else{
																					echo "<div class='label label-danger' title='Errada'>
																					<i class='fa fa-times'></i>
																					</div>";
																				}

																			}else{
																				echo "<div class='label label-warning' title='Não respondida'>
																				<i class='fa fa-question'></i>
																				</div>";
																			}
																			$p++;
																			?>
																		</div>		
																	</div>
																<?php } ?>
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