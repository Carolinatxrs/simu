<?php
	require"../bd/VerefSession.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Atualizar Usuário</title>
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
												<h5>Dados Atualizados</h5>
											</div>
										</div>
										<div class="panel-body">
											<?php 
												require_once ('../bd/Conexao.php');
												$con = new Conexao();

												if(isset($_SESSION['msgcad'])){
													echo $_SESSION['msgcad'];
													unset($_SESSION['msgcad']);
												}
												$sql_u = "SELECT * FROM usuario WHERE cpf_user = '$_SESSION[cpf_user]'";

												$result_u = mysqli_query($con->conexao(),$sql_u);
												while($sql_u = mysqli_fetch_array($result_u)){
											?>
											<div class="bloco_opcao">
												<label for="default" class="col-sm-2 control-label">Nome</label>
												<p class="text-justify"><?php echo "".$sql_u['nome_user']." ".$sql_u['sobrenome_user'].""; ?></p>
												<label for="default" class="col-sm-2 control-label">Data de Nascimento</label>
												<p class="text-justify"><?php echo $sql_u['dt_nasc_user']; ?></p>
												<label for="default" class="col-sm-2 control-label">Sexo</label>
												<p class="text-justify"><?php echo $sql_u['sexo_user']; ?></p>
												<hr>
												<label for="default" class="col-sm-2 control-label">Instituição</label>
												<p class="text-justify"><?php echo $sql_u['instituto_user']; ?></p>
												<label for="default" class="col-sm-2 control-label">Cidade</label>
												<p class="text-justify"><?php echo $sql_u['cidade_user']; ?></p>
												<label for="default" class="col-sm-2 control-label">UF</label>
												<p class="text-justify"><?php echo $sql_u['uf_user']; ?></p>
												<label for="default" class="col-sm-2 control-label">Senha</label>
												<p class="text-justify"><?php echo $sql_u['senha_user']; ?></p>
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