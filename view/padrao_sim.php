<?php
	require"../bd/VerefSession.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Simulado Padrão</title>
        <link rel="shortcut icon" href="../templates/images/fav/fav.ico" type="image/x-icon">
        <link rel="stylesheet" href="../templates/menu/css/bootstrap.min.css" media="screen" >
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="../templates/menu/css/animate-css/animate.min.css" media="screen" >
		<link rel="stylesheet" href="../templates/menu/css/lobipanel/lobipanel.min.css" media="screen" >
		<link rel="stylesheet" href="../templates/menu/css/prism/prism.css" media="screen" >
		<link rel="stylesheet" href="../templates/menu/css/select2/select2.min.css" >
		<link rel="stylesheet" href="../templates/menu/css/main.css" media="screen" >
		<script src="../templates/menu/js/modernizr/modernizr.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script><!--especifico para input oculto -->
		<script src="../templates/js/ocultar.js"></script>
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
										<li class="active">Padrão</li>
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
												<h5>Realizar Simulado Padrão</h5>
											</div>
										</div>
										<div class="panel-body">
											<?php 
												require_once ('../bd/Conexao.php');
												$con = new Conexao();

												if(isset($_SESSION['msger'])){
													echo $_SESSION['msger'];
													unset($_SESSION['msger']);
												}
											?>
											<div class="container">
												<div class="row">
													<form class="form-horizontal" action="../action/run_padrao.php" method="POST" enctype="multipart/form-data" autocomplete="off">
														<div class="form-group">
															<label for="default" class="col-md-2 control-label">Exame</label>
															<div class="col-sm-6">
																<select id="mySelect" class="form-control" name="exame_q" required autofocus>
																	<option value="">Selecione o exame</option>
																	<option value="Enade">Enade</option>
																	<option value="Poscomp">Poscomp</option>
																</select>
															</div>
														</div>

														<div id="inputOculto" class="form-group">
															<label for="default" class="col-sm-2 control-label">Área</label>
															<div  class="col-sm-6">
																<select class="form-control" name="area_q">
																	<option value="0">Selecione uma área</option>
																	<option value="Ciência da Computação">Ciência da Computação</option>
																	<option value="Engenharia de Computação">Engenharia de Computação</option>
																	<option value="Sistemas de Informação">Sistemas de Informação</option>
																</select>
															</div>
														</div>

														<div class="form-group">
															<label for="default" class="col-sm-2 control-label">Ano</label>
															<div class="col-sm-6">
																<input type="text" class="form-control" name="ano_q" maxlength="4" pattern=".{4,}" title="preencha os 4 caracteres" placeholder="Digite o ano da prova" required autofocus>
															</div>
															<div class="help-block with-errors text-danger"></div>
														</div>

														<div class="form-group">
															<div class="col-sm-offset-2 col-sm-6">
																<button type="submit" class="btn btn-success btn-lg">Enviar</button>
																<button type="reset" class="btn btn-danger btn-lg">Limpar</button>
															</div>
														</div>
													</form>
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
	</body>
</html>