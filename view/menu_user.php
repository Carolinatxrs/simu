<?php
	require"../bd/VerefSession.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Menu Usuário</title>
        <link rel="shortcut icon" href="../templates/images/fav/fav.ico" type="image/x-icon">
        <link rel="stylesheet" href="../templates/menu/css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
         <link rel="stylesheet" href="../templates/menu/css/animate-css/animate.min.css" media="screen">
        <link rel="stylesheet" href="../templates/menu/css/lobipanel/lobipanel.min.css" media="screen"> <!-- barra lateral -->
        <link rel="stylesheet" href="../templates/menu/css/toastr/toastr.min.css" media="screen">
        <link rel="stylesheet" href="../templates/menu/css/main.css"> <!-- layout -->
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
									<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
										<a class="dashboard-stat bg-azul" href="historico_user.php">
											<?php 
											require_once ('../bd/Conexao.php');
											$con = new Conexao();
											$sql = "SELECT sum(qtd_q_his) FROM historico WHERE usuario_cpf_user = '$_SESSION[cpf_user]'";

											$result = mysqli_query($con->conexao(),$sql);
											while($row = mysqli_fetch_array($result)){
												$totalq = $row['sum(qtd_q_his)'];
												if ($totalq == NULL) {
													$totalq = 0;
												}
											}
											?>
											<span class="bg-icon"><i class="fa fa-list-ul"></i></span>
											<span class="number counter"><?php echo $totalq;?></span>
											<span class="name">Questões Resolvidas</span>
										</a>
									</div>

									<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
										<a class="dashboard-stat bg-verde" href="historico_user.php">
											<?php 
											require_once ('../bd/Conexao.php');
											$con = new Conexao();
											$sql_a = "SELECT sum(qtd_ac_his) FROM historico WHERE usuario_cpf_user = '$_SESSION[cpf_user]'";

											$result_a = mysqli_query($con->conexao(),$sql_a);
											while($row_a = mysqli_fetch_array($result_a)){
												$total_a = $row_a['sum(qtd_ac_his)'];
												if ($total_a == NULL) {
													$total_a = 0;
												}
											}
											?>
											<span class="bg-icon"><i class="fa fa-check"></i></span>
											<span class="number counter"><?php echo $total_a;?></span>
											<span class="name">Acertos</span>
										</a>
									</div>

									<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
										<a class="dashboard-stat bg-vermelho" href="historico_user.php">
											<?php 
											require_once ('../bd/Conexao.php');
											$con = new Conexao();
											$sql_e = "SELECT sum(qtd_er_his) FROM historico WHERE usuario_cpf_user = '$_SESSION[cpf_user]'";

											$result_e = mysqli_query($con->conexao(),$sql_e);
											while($row_e = mysqli_fetch_array($result_e)){
												$total_e = $row_e['sum(qtd_er_his)'];
												if ($total_e == NULL) {
													$total_e = 0;
												}
											}
											?>
											<span class="bg-icon"><i class="fa fa-times"></i></span>
											<span class="number counter"><?php echo $total_e;?></span>
											<span class="name">Erros</span>
										</a>
									</div>

									<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
										<a class="dashboard-stat bg-score" href="historico_user.php">
											<?php
											if($totalq > 0){
												$score = ((100*$total_a)/$totalq);
												$total_d = round($score,2);
											}else{
												$total_d = 0;
											}
											?>
											<span class="bg-icon"><i class="fa fa-star"></i></span>
											<span class="number counter"><?php echo $total_d."%";?></span>
											<span class="name">Desempenho</span>
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