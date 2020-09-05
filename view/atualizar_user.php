<?php
	require"../bd/VerefSession.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Atualizar Usuário </title>
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
								<div class="col-sm-6">
									<h2 class="title">Perfil</h2>
								</div>
							</div>
							<div class="row breadcrumb-div">
								<div class="col-md-6">
									<ul class="breadcrumb">
										<li><a href="menu_user.php"><i class="fa fa-home"></i>Início</a></li>
										<li class="active">Perfil</li>
										<li class="active">Atualizar Dados</li>
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
												<h5>Atualizar Dados</h5>
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
												$sql_u = "SELECT * FROM usuario WHERE cpf_user = '$_SESSION[cpf_user]'";

												$result_u = mysqli_query($con->conexao(),$sql_u);
												while($sql_u = mysqli_fetch_array($result_u)){
											?>
												<div class="container">
													<div class="row">
														<form class="form-horizontal" action="../action/edi_user.php" method="POST" enctype="multipart/form-data" autocomplete="off">
															<div class="form-group">
																<label for="default" class="col-sm-2 control-label">Nome</label>
																<div class="col-sm-6">
																	<input type="text" class="form-control" value="<?php echo $sql_u['nome_user'];?>" name="nome_user" pattern=".{3,}" title="3 ou mais caracteres." required autofocus>
																</div>
																<div class="help-block with-errors text-danger"></div>
															</div>

															<div class="form-group">
																<label for="default" class="col-sm-2 control-label">Sobrenome</label>
																<div class="col-sm-6">
																	<input type="text" class="form-control" value="<?php echo $sql_u['sobrenome_user'];?>" name="sobrenome_user"  pattern=".{2,}" title="2 ou mais caracteres." required autofocus>
																</div>
																<div class="help-block with-errors text-danger"></div>
															</div>

															<div class="form-group">
																<label for="default" class="col-sm-2 control-label">CPF</label>
																<div class="col-sm-6">
																	<input type="text" class="form-control" value="<?php echo $sql_u['cpf_user'];?>" name="cpf_user" readonly>
																</div>
															</div>

															<div class="form-group">
																<label for="default" class="col-sm-2 control-label">Data de Nascimento</label>
																<div class="col-sm-6">
																	<input type="text" class="form-control" value="<?php echo $sql_u['dt_nasc_user'];?>" name="dt_nasc_user" readonly>
																</div>
															</div>

															<div class="form-group">
																<label for="default" class="col-sm-2 control-label">Sexo</label>
																<div class="col-sm-6">
																	<?php
																	switch($sql_u['sexo_user']){
																		case "F":
																		echo"<select class='form-control' name='sexo_user'>
																		<option>$sql_u[sexo_user]</option>
																		<option value='M'>M</option>
																		</select>"; break;
																		case "M":
																		echo"<select class='form-control' name='sexo_user'>
																		<option>$sql_u[sexo_user]</option>
																		<option value='F'>F</option>
																		</select>"; break;
																	} ?>
																</div>
															</div>

															<div class="form-group">
																<label for="default" class="col-sm-2 control-label">Instituição</label>
																<div class="col-sm-6">
																	<input type="text" class="form-control" value="<?php echo $sql_u['instituto_user'];?>" name="instituto_user" maxlength="10" required autofocus>
																</div>
															</div>

															<div class="form-group">
																<label for="default" class="col-sm-2 control-label">Cidade</label>
																<div class="col-sm-6">
																	<input type="text" class="form-control" value="<?php echo $sql_u['cidade_user'];?>" name="cidade_user" maxlength="50" required autofocus>
																</div>
															</div>
														
															<div class="form-group">
																<label for="default" class="col-sm-2 control-label">UF</label>
																<div class="col-sm-6">
																	<input type="text" class="form-control" value="<?php echo $sql_u['uf_user'];?>" name="uf_user" maxlength="2" required autofocus>
																</div>
															</div>

															<div class="form-group">
																<label for="default" class="col-sm-2 control-label">Senha</label>
																<div class="col-sm-6">
																	<input type="text" class="form-control" value="<?php echo $sql_u['senha_user'];?>" name="senha_user" readonly>
																</div>
															</div>

															<div class="form-group">
																<label for="default" class="col-sm-2 control-label">Foto</label>
																<div class="col-sm-6">
																	<input type="file" class="form-control" value="<?php echo $sql_u['foto_user'];?>" name="foto_user" required autofocus>
																</div>
															</div>

															<div class="form-group">
																<div class="col-sm-offset-2 col-sm-6">
																	<button type="submit" class="btn btn-success btn-lg">Salvar</button>
																	<a class="btn btn-warning btn-lg" href="menu_user.php" role="button">Cancelar</a>
																</div>
															</div>
														</form>
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