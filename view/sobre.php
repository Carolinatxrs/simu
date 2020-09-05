<?php
	require"../bd/VerefSession.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Sobre </title>
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
									<h2 class="title">Sobre</h2>
								</div>
							</div>
							<div class="row breadcrumb-div">
								<div class="col-md-6">
									<ul class="breadcrumb">
										<li><a href="menu_user.php"><i class="fa fa-home"></i>Início</a></li>
										<li class="active">Sobre</li>
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
												<h5>Sobre o SEEP | Comp</h5>
											</div>
										</div>
										<div class="panel-body">
											<div class="bloco_opcao">
												<p class="text-justify"> O Sistema de Exames do Enade e Poscomp (SEEP | Comp) tem como intuito permitir aos seus usuários realizar simulados de questões do Exame Nacional de Desempenho do Estudante (ENADE) e Exame Nacional para Ingresso na Pós-Graduação em Computação (POSCOMP). Atualmente o ambiente permite que o usuário gere simulados de acordo com suas necessidades. Podendo ser o padrão com a quantidade de questões utilizadas nas provas oficiais ou personalizado gerado de acordo com o exame, categoria e a quantidade de questões. Além de disponibilizar as provas dos exames de anos anteriores para download. Buscando auxiliar na preparação e desempenho dos acadêmicos da área de computação</p>
											</div>
										</div>
										<div class="panel-heading">
											<div class="panel-title">
												<h5>Desenvolvimento</h5>
											</div>
										</div>
										<div class="panel-body">
											<div class="bloco_opcao">
												<p>Trabalho de Conclusão de Curso</p>
												<p>Desenvolvido por Maria Carolina Teixeira da Silva - ICET/UFAM</p>
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