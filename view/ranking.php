<?php
	if ($_GET['rk'] == 0) {
		require"../bd/VerefSession.php";
	}else{
		require"../bd/VerefAdSession.php";
	}
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ranking</title>
        <link rel="shortcut icon" href="../templates/images/fav/fav.ico" type="image/x-icon">
        <link rel="stylesheet" href="../templates/menu/css/bootstrap.min.css" media="screen" >
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="../templates/menu/css/animate-css/animate.min.css" media="screen" >
		<link rel="stylesheet" href="../templates/menu/css/lobipanel/lobipanel.min.css" media="screen" >
		<link rel="stylesheet" href="../templates/menu/css/prism/prism.css" media="screen" >
		<link rel="stylesheet" href="../templates/menu/css/main.css" media="screen" >
		<link rel="stylesheet" href="https://code.jquery.com/jquery-3.3.1.js">
		<script src="../templates/menu/js/modernizr/modernizr.min.js"></script>
	</head>
	<body class="top-navbar-fixed">
		<div class="main-wrapper">
			<?php if ($_GET['rk'] == 0) {
				include('bar_top.php');
			}else{
				include('bar_top_admin.php');
			} ?>
			<div class="content-wrapper">
				<div class="content-container">
					<?php if ($_GET['rk'] == 0) {
						include('bar_left.php');
					}else{
						include('bar_left_admin.php');
					} ?>  
					<div class="main-page">
						<div class="container-fluid">
							<div class="row page-title-div">
								<div class="col-md-6">
									<h2 class="title">Ranking</h2>
								</div>
							</div>
							<div class="row breadcrumb-div">
								<div class="col-md-6">
									<ul class="breadcrumb">
										<li><?php if ($_GET['rk'] == 0) {
											echo "<a href='menu_user.php'><i class='fa fa-home'></i>Início</a>";
										}else{
											echo "<a href='menu_admin.php'><i class='fa fa-home'></i>Início</a>";
										} ?>
										</li>
										<li class="active">Ranking</li>
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
												<h5>Ranking Geral</h5>
											</div>
										</div>
										<div class="panel-body">
											<div class="table-responsive">
												<table class="display table table-striped" cellspacing="0" width="100%">
													<thead>
														<tr>
															<th>#</th>
															<th>Foto</th>
															<th>Usuário</th>
															<th>Instituto</th>
															<th>Cidade</th>
															<th>UF</th>
															<th>Score</th>
														</tr>
													</thead>
													<tbody>
														<?php 
														require_once ('../bd/Conexao.php');
														$con = new Conexao();
														$cont=0;
														$sql_rank = "SELECT * FROM ranking ORDER BY ponto_r DESC";
														$result_rank = mysqli_query($con->conexao(),$sql_rank);

														while($row_rank = mysqli_fetch_array($result_rank)){
															$usuario_cpf = $row_rank['usuario_cpf_user'];
															$ponto_r = $row_rank['ponto_r'];

															$sql_user = "SELECT * FROM usuario WHERE cpf_user = '$usuario_cpf'";
															$result_user = mysqli_query($con->conexao(),$sql_user);

															while($row_user = mysqli_fetch_array($result_user)){
																?>
																<tr>
																	<td> <?php echo $cont+=1; ?></td>
																	<td> <?php echo "<img src='".$row_user["loc_user"].$row_user["foto_user"]."' class='img-circle' width='50px'>" ?></td>
																	<td> <?php echo $row_user['nome_user'];?></td>
																	<td> <?php echo $row_user['instituto_user']; ?></td>
																	<td> <?php echo $row_user['cidade_user']; ?></td>
																	<td> <?php echo $row_user['uf_user']; ?></td>
																	<?php 
																	if($cont == '1'){
																		echo "<td><span class='label label-sm label-success'>".$ponto_r."</span></td>";
																	}elseif ($cont == '2'){
																		echo "<td><span class='label label-sm label-primary'>".$ponto_r."</span></td>";
																	}elseif ($cont == '3'){
																		echo "<td><span class='label label-sm label-info'>".$ponto_r."</span></td>";
																	}else{
																		echo "<td>".$ponto_r."</td>";
																	}
																	?>
																</tr>
															<?php }
														} ?>
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
		<script src="../templates/menu/js/main.js"></script>
	</body>
</html>