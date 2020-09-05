<?php
	require"../bd/VerefSession.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Histórico</title>
        <link rel="shortcut icon" href="../templates/images/fav/fav.ico" type="image/x-icon">
        <link rel="stylesheet" href="../templates/menu/css/bootstrap.min.css" media="screen">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="../templates/menu/css/animate-css/animate.min.css" media="screen">
		<link rel="stylesheet" href="../templates/menu/css/lobipanel/lobipanel.min.css" media="screen">
		<link rel="stylesheet" href="../templates/menu/css/prism/prism.css" media="screen" >
		<link rel="stylesheet" href="https://code.jquery.com/jquery-3.3.1.js">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs-3.3.7/dt-1.10.18/b-1.5.6/datatables.min.css">
		<link rel="stylesheet" href="../templates/menu/css/select2/select2.min.css">
		<link rel="stylesheet" href="../templates/menu/css/main.css" media="screen">
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
									<h2 class="title">Histórico</h2>
								</div>
							</div>
							<div class="row breadcrumb-div">
								<div class="col-md-6">
									<ul class="breadcrumb">
										<li><a href="menu_user.php"><i class="fa fa-home"></i>Início</a></li>
										<li class="active">Histórico</li>
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
												<h5>Meu Histórico</h5>
											</div>
										</div>
										<div class="panel-body">
											<div class="table-responsive">
												<table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
													<thead>
														<tr>
															<th>#</th>
															<th>Simulado</th>
															<th>Exame</th>
															<th>Data</th>
															<th>Questões</th>
															<th>Acertos</th>
															<th>Erros</th>
															<th>Desempenho</th>
														</tr>
													</thead>
													<tfoot>
														<tr>
															<th>#</th>
															<th>Simulado</th>
															<th>Exame</th>
															<th>Data</th>
															<th>Questões</th>
															<th>Acertos</th>
															<th>Erros</th>
															<th>Desempenho</th>
														</tr>
													</tfoot>
													<tbody>
														<?php 
														require_once ('../bd/Conexao.php');
														$con = new Conexao();
														$cont=0;
														$sql_his = "SELECT * FROM historico WHERE usuario_cpf_user = '$_SESSION[cpf_user]' ORDER BY data_his DESC";

														$result_his = mysqli_query($con->conexao(),$sql_his);
														while($sql_his = mysqli_fetch_array($result_his)){
															?>
														<tr>
															<td> <?php echo $cont+=1; ?></td>
															<td> <?php echo $sql_his['simulado_his']; ?></td>
															<td> <?php echo $sql_his['exame_his']; ?></td>
															<td> <?php echo $sql_his["data_his"]; ?></td>
															<td> <?php echo $sql_his['qtd_q_his']; ?></td>
															<td> <?php echo $sql_his['qtd_ac_his']; ?></td>
															<td> <?php echo $sql_his['qtd_er_his']; ?></td>
															<?php $score = (($sql_his['qtd_ac_his']/$sql_his['qtd_q_his']) * 100);

															$ponto_his = round($score,2);
															if($ponto_his >= '70'){
																echo "<td><span class='label label-sm  label-success'>".$ponto_his."%</span></td>";
															}elseif ($ponto_his >= '50' && $ponto_his < '70') {
																echo "<td><span class='label label-sm  label-warning'>".$ponto_his."%</span></td>";
															}else {
																echo "<td><span class='label label-sm  label-danger'>".$ponto_his."%</span></td>";
															}
															?>
														</tr>
														<?php } ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>	<!-- /.col-md-12 -->
							</div>
						</div>
					</div>
				</div>	<!-- /.content-container -->
			</div>
		</div>	<!-- main-wrapper -->
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
		<script src="https://cdn.datatables.net/v/bs-3.3.7/dt-1.10.18/b-1.5.6/datatables.min.js"></script>
		<script>
			$(function($) {
				$('#example').DataTable({
					"language": {
						"url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"
					}
				});

				$('#example2').DataTable( {
					"scrollY":        "30px",
					"scrollCollapse": true,
					"paging":         false
				} );

				$('#example3').DataTable();
			});
		</script>
		<script src="../templates/menu/js/select2/select2.min.js"></script>
		<script src="../templates/menu/js/main.js"></script>
	</body>
</html>