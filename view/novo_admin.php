<?php
	require"../bd/VerefAdSession.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Novo Admin</title>
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
								<div class="col-sm-6">
									<h2 class="title">Novo Administrador</h2>
								</div>
							</div>
							<div class="row breadcrumb-div">
								<div class="col-md-6">
									<ul class="breadcrumb">
										<li><a href="menu_admin.php"><i class="fa fa-home"></i>Início</a></li>
										<li class="active">Novo Administrador</li>
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
												<h5>Cadastrar Administrador</h5>
											</div>
										</div>
										<div class="panel-body">
											<?php 
												require_once ('../bd/Conexao.php');
												$con = new Conexao();

												if(isset($_SESSION['msg'])){
													echo $_SESSION['msg'];
													unset($_SESSION['msg']);
												}
												if(isset($_SESSION['msgcad'])){
													echo $_SESSION['msgcad'];
													unset($_SESSION['msgcad']);
												}
											?>
											<div class="container">
												<div class="row">
													<form class="form-horizontal" action="../action/cad_admin.php" method="POST" enctype="multipart/form-data" autocomplete="off">
														<div class="form-group">
															<label for="default" class="col-sm-2 control-label">Login</label>
															<div class="col-sm-6">
																<input type="text" class="form-control" name="login_admin" maxlength="11" pattern=".{5,}" title="5 ou mais caracteres" placeholder="Digite o login" required autofocus>
															</div>
															<div class="help-block with-errors text-danger"></div>
														</div>
														
														<div class="form-group">
															<label for="default" class="col-sm-2 control-label">Senha</label>
															<div class="col-sm-6">
																<input type="password" class="form-control" name="senha_admin" maxlength="6" pattern=".{6,}" title="preencha os 6 caracteres" placeholder="Digite apenas 6 caracteres" required autofocus>
															</div>
															<div class="help-block with-errors text-danger"></div>
														</div>

														<div class="form-group">
															<label for="default" class="col-sm-2 control-label">Confirmar Senha</label>
															<div class="col-sm-6">
																<input type="password" class="form-control" name="conf_senha_admin" maxlength="6" pattern=".{6,}" title="preencha os 6 caracteres" placeholder="Repita a senha" required autofocus>
															</div>
															<div class="help-block with-errors text-danger"></div>
														</div>

														<div class="form-group">
															<label for="default" class="col-sm-2 control-label">Foto</label>
															<div class="col-sm-6">
																<input type="file" class="form-control" name="foto_admin" placeholder="Selecione um arquivo"  required autofocus>
															</div>
														</div>

														<div class="form-group">
															<div class="col-sm-offset-2 col-sm-6">
																<button type="submit" class="btn btn-success btn-lg">Cadastrar</button>
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
		</div>	<!-- /.main-wrapper -->
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