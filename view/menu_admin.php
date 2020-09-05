<?php
	require"../bd/VerefAdSession.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Menu Admin</title>
        <link rel="shortcut icon" href="../templates/images/fav/fav.ico" type="image/x-icon">
        <link rel="stylesheet" href="../templates/menu/css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
         <link rel="stylesheet" href="../templates/menu/css/animate-css/animate.min.css" media="screen">
        <link rel="stylesheet" href="../templates/menu/css/lobipanel/lobipanel.min.css" media="screen"> <!-- barra lateral -->
        <link rel="stylesheet" href="../templates/menu/css/toastr/toastr.min.css" media="screen">
        <link rel="stylesheet" href="../templates/menu/css/main.css" media="screen"> <!-- layout -->
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
									<h2 class="title">Início</h2>
								</div>
							</div>
						</div>
						<section class="section">
							<div class="container-fluid">
								<div class="row">
									<?php 
									if(isset($_SESSION['msge'])){
										echo $_SESSION['msge'];
										unset($_SESSION['msge']);
									}
									?>
									<div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
										<a class="dashboard-stat bg-verde" href="estatistica_admin.php">
											<?php 
											require_once ('../bd/Conexao.php');
											$con = new Conexao();
											$sql_us = "SELECT count(*) + (SELECT count(*) FROM usuario) as total from admin";
											$result_us = mysqli_query($con->conexao(),$sql_us);

											while ($row_us = mysqli_fetch_assoc($result_us)){
												$total_us = $row_us['total'];
											}
											?>
											<span class="bg-icon"><i class="fa fa-users"></i></span>
											<span class="number counter"><?php echo $total_us;?></span>
											<span class="name">Total de Usuários</span>
										</a>
									</div>

									<div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
										<a class="dashboard-stat bg-azul" href="estatistica_admin.php">
											<?php 

											$sql_qs = "SELECT count(*) as totalq FROM questao";
											$result_qs = mysqli_query($con->conexao(),$sql_qs);

											while ($row_qs = mysqli_fetch_assoc($result_qs)){
												$total_qs = $row_qs['totalq'];
											}
											?>
											<span class="bg-icon"><i class="fa fa-list-ul"></i></span>
											<span class="number counter"><?php echo $total_qs;?></span>
											<span class="name">Questões</span>
										</a>
									</div>

									<div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
										<a class="dashboard-stat bg-vermelho" href="estatistica_admin.php">
											<?php 
											$sql_p = "SELECT count(*) as totalp FROM prova";
											$result_p = mysqli_query($con->conexao(),$sql_p);

											while ($row_p = mysqli_fetch_assoc($result_p)){
												$total_p = $row_p['totalp'];
											}
											?>
											<span class="bg-icon"><i class="fa fa-file"></i></span>
											<span class="number counter"><?php echo $total_p;?></span>
											<span class="name">Provas</span>
										</a>
									</div>
								</div>
							</div>
						</section>
						<!-- /.section -->
					</div>
					<!-- /.main-page -->
				</div>
				<!-- /.content-container -->
			</div>
			<!-- /.content-wrapper -->
		</div>	<!-- /.main-wrapper -->
		<!-- Rodapé -->	
		<?php include('footer.php');?> 
		<!-- ========== ARQUIVOS JS COMUNS ========== -->
		<script src="../templates/menu/js/jquery/jquery-2.2.4.min.js"></script> <!--barra lateral-->
		<script src="../templates/menu/js/jquery-ui/jquery-ui.min.js"></script>
		<script src="../templates/menu/js/bootstrap/bootstrap.min.js"></script> <!--barra lateral-->
		<script src="../templates/menu/js/pace/pace.min.js"></script>
		<script src="../templates/menu/js/lobipanel/lobipanel.min.js"></script> <!--barra lateral-->
		<script src="../templates/menu/js/iscroll/iscroll.js"></script>
		<!-- ========== ARQUIVOS JS PÁGINA ========== -->
		<script src="../templates/menu/js/prism/prism.js"></script>
		<script src="../templates/menu/js/waypoint/waypoints.min.js"></script>
		<script src="../templates/menu/js/counterUp/jquery.counterup.min.js"></script>
		<script src="../templates/menu/js/amcharts/amcharts.js"></script>
		<script src="../templates/menu/js/amcharts/serial.js"></script>
		<script src="../templates/menu/js/amcharts/plugins/export/export.min.js"></script>
		<link rel="stylesheet" href="../templates/menu/js/amcharts/plugins/export/export.css" type="text/css" media="all" />
		<script src="../templates/menu/js/amcharts/themes/light.js"></script>
		<script src="../templates/menu/js/toastr/toastr.min.js"></script>
		<script src="../templates/menu/js/icheck/icheck.min.js"></script>
		<!-- ========== TEMA JS ========== -->
		<script src="../templates/menu/js/main.js"></script>
		<script src="../templates/menu/js/production-chart.js"></script>
		<script src="../templates/menu/js/traffic-chart.js"></script>
		<script src="../templates/menu/js/task-list.js"></script>
		<script>
			$(function(){
                // Contador de estatísticas do painel
                
                $('.counter').counterUp({
                	delay: 100,
                	time: 1000
                });
                
                // Notificação de bem-vindo
                toastr.options = {
                	"closeButton": true,
                	"debug": false,
                	"newestOnTop": false,
                	"progressBar": false,
                	"positionClass": "toast-top-right",
                	"preventDuplicates": false,
                	"onclick": null,
                	"showDuration": "300",
                	"hideDuration": "1000",
                	"timeOut": "5000",
                	"extendedTimeOut": "1000",
                	"showEasing": "swing",
                	"hideEasing": "linear",
                	"showMethod": "fadeIn",
                	"hideMethod": "fadeOut"
                }
                toastr["success"]("Bem-vindo ao Sistema de Exames do Enade e Poscomp!");
            });
        </script>
    </body>
</html>